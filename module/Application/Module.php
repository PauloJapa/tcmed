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
    
    public function validaAuth($e) {
        $auth = new AuthenticationService;
        $auth->setStorage(new SessionStorage("Application"));
        
        $controller = $e->getTarget();
        $matchedRoute = $controller->getEvent()->getRouteMatch()->getMatchedRouteName();
//        echo '<pre>', var_dump($matchedRoute);die;
        if(!$auth->hasIdentity() and $matchedRoute == "app/default"){
            return $controller->redirect()->toRoute("application-auth");
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
                'Application\Service\User' => function ($sm) {
                    return new Service\User($sm->get('Doctrine\ORM\EntityManager'), $sm->get('Application\Mail\Transport'), $sm->get('View'));
                },
                'Application\Auth\Adapter' => function($sm) {
                    return new AuthAdapter($sm->get('Doctrine\ORM\EntityManager'));
                }
            )
        );
    }
    
    public function getViewHelperConfig() {
        return [
            'invokables' => [
                'UserIdentity' => new View\Helper\UserIdentity(),
                'Table' => new View\Helper\Table(),
                'FormHelp' => new View\Helper\FormHelp(),
            ]
        ];
    }

}
