<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\ArrayAdapter;

abstract class CrudController extends AbstractActionController {

    /**
     *
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;
    /**
     * O nome do Modulo
     * @var string
     */
    protected $moduloName;
    protected $service;
    protected $entity;
    protected $form;
    protected $route;
    protected $controller;
    /**
     *
     * @var Zend\View\Model\ViewModel 
     */
    protected $view;
    
    public function __construct() {
        $this->moduloName = "Application";        
    }

    public function logedAction() {
        return new ViewModel();
    }

    public function cadastroAction() {
        return $this->view;
    }

    public function indexAction() {
        $list = $this->getEm()
                ->getRepository($this->entity)
                ->findAll();
        
        $page = $this->params()->fromRoute('page');

        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page)
                ->setDefaultItemCountPerPage(1);

        return $this->makeView(['data' => $paginator, 'page' => $page]);
    }

    public function newAction() {
        $form = new $this->form();
        $request = $this->getRequest();
        if ($request->isPost()) {
var_dump($request->getPost()->toArray());die;
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->insert($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        return $this->makeView(['form' => $form]);
    }

    public function editAction() {
        $form = new $this->form();
        $request = $this->getRequest();

        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));

        if ($this->params()->fromRoute('id', 0))
            $form->setData($entity->toArray());

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        return $this->makeView(['form' => $form]);
    }

    public function deleteAction() {
        $service = $this->getServiceLocator()->get($this->service);
        if ($service->delete($this->params()->fromRoute('id', 0))) {
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
        }
    }

    /**
     * Pega ou cria a instancia do DoctrineManage
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEm() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }
    
    /**
     * Facilita a montagem da view para o navegador.
     * @param array   $params
     * @param boolean $terminal
     * @return Zend\View\Model\ViewModel
     */
    protected function makeView($params,$terminal=true){
        $this->view = new ViewModel($params);
        $this->view->setTerminal($terminal);
        return $this->view;
    }

}
