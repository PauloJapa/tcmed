<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
use Application\Auth\Adapter as AuthAdapter;

use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;
use Zend\ModuleManager\ModuleManager;

class Module {

    public function onBootstrap(MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);    
        $eventManager->getSharedManager()->attach(
            'Zend\Mvc\Controller\AbstractActionController', 
            'dispatch', 
                function($e){
                $controller = $e->getTarget();
                $config = $e->getApplication()->getServiceManager()->get('config');
                $ajax = 'no';
                if(isset($_GET['ajax']) AND $_GET['ajax'] == 'ok'){
                    $ajax = 'ok';       
                }
                if($controller->params()->fromRoute('ajax', 'no') == 'ok'){
                    $ajax = 'ok';  
                }               
                if (isset($config['module_layouts'][$ajax])) {
                    $controller->layout($config['module_layouts'][$ajax]);
                }
            }, 
            100
        );  
        
        $eventManager->attach(
            'dispatch.error',
            array($this,'noLayout'), 
            99
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function init(ModuleManager $mm) {
        $sharedEvents = $mm->getEventManager()->getSharedManager();
        
        $sharedEvents->attach(
            "Zend\Mvc\Controller\AbstractActionController", 
            MvcEvent::EVENT_DISPATCH, 
            [$this, 'validaAuth'], 
            100
        );
                
    }
    
    public function noLayout($e) {
        $controller = $e->getTarget();
        $config = $e->getApplication()->getServiceManager()->get('config');
        $ajax = 'no';
        if(isset($_GET['ajax']) AND $_GET['ajax'] == 'ok'){
            $ajax = 'ok';       
        }
//        if($controller->params()->fromRoute('ajax', 'no') == 'ok'){
//            $ajax = 'ok';  
//        }               
//        if (isset($config['module_layouts'][$ajax])) {
//            $controller->layout($config['module_layouts'][$ajax]);
//        }        
    }
    
    public function validaAuth($e) {
        $auth = new AuthenticationService;
        $auth->setStorage(new SessionStorage("Application"));
        
        $controller = $e->getTarget();
        $matchedRoute = $controller->getEvent()->getRouteMatch()->getMatchedRouteName();
        if(!$auth->hasIdentity() and ($matchedRoute == "app/default" OR $matchedRoute == "app/ajax" OR $matchedRoute == "home")){
            $ajax = 'no';
            if(isset($_GET['ajax']) AND $_GET['ajax'] == 'ok'){
                $ajax = 'ok';       
            }
            if($controller->params()->fromRoute('ajax', 'no') == 'ok'){
                $ajax = 'ok';  
            }
            return $controller->redirect()->toRoute("application-auth", array('ajax'=>$ajax));
        }
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Application\Mail\Transport' => function($sm) {
                    $config = $sm->get('Config');
                    $transport = new SmtpTransport;
                    $options = new SmtpOptions($config['mail']);
                    $transport->setOptions($options);

                    return $transport;
                },
                'Application\Service\Usuario' => function ($sm) {
                    return new Service\Usuario($sm->get('Doctrine\ORM\EntityManager'), $sm->get('Application\Mail\Transport'), $sm->get('View'));
                },
                'Application\Auth\Adapter' => function($sm) {
                    return new AuthAdapter($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Service\Parametros' => function($sm) {
                    return new Service\Parametros($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Service\User' => function($sm) {
                    return new Service\User($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Service\Grupo' => function($sm) {
                    return new Service\Grupo($sm->get('Doctrine\ORM\EntityManager'));
                },
                'Application\Service\Contato' => function($sm) {
                    return new Service\Contato($sm->get('Doctrine\ORM\EntityManager'));
                },
                'UserIdentity' => function($sm) {
                    return new \Application\View\Helper\UserIdentity();
                },
                'Application\Permissions\Acl' => function($sm){
                    $em = $sm->get('Doctrine\ORM\EntityManager');

                    $repoRole = $em->getRepository("Application\Entity\AppRole");
                    $roles = $repoRole->findAll();

                    $repoResource = $em->getRepository("Application\Entity\AppResource");
                    $resources = $repoResource->findAll();

                    $repoPrivilege = $em->getRepository("Application\Entity\AppPrivilege");
                    $privileges = $repoPrivilege->findAll();

                    return new \Application\Permissions\Acl($roles,$resources,$privileges);
                },
            )
        );
    }
    
    public function getViewHelperConfig() {
        return [
            'invokables' => [
                'UserIdentity' => 'Application\View\Helper\UserIdentity',
                'Table' => 'Application\View\Helper\Table',
                'FormHelp' => 'Application\View\Helper\FormHelp',
                'NewMenu' => 'Application\View\Helper\NewMenu',
            ],
            'factories' => [
                'Url'            => function ($helperPluginManager) {
                    $serviceLocator = $helperPluginManager->getServiceLocator();
                    $view_helper =  new \Application\View\Helper\Url();
                    $router = \Zend\Console\Console::isConsole() ? 'HttpRouter' : 'Router';
                    $view_helper->setRouter($serviceLocator->get($router));

                    $match = $serviceLocator->get('application')
                        ->getMvcEvent()
                        ->getRouteMatch();

                    if ($match instanceof RouteMatch) {
                        $view_helper->setRouteMatch($match);
                    }

                    return $view_helper;
                }
            ],
        ];
    }

}
