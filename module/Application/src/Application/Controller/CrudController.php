<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Paginator\Paginator,
    Doctrine\ORM\Tools\Pagination\Paginator as DoctrinePaginator,
    DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as PaginatorAdapter;

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
    protected $name;
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
    /**
     *
     * @var Zend\Paginator\Paginator
     */
    protected $paginator;
    protected $page;
    protected $render = TRUE;
    
    public function __construct($name='') {
        $this->name = strtolower($name);
        $this->moduloName = "Application";  
        $this->entity = $this->moduloName . "\Entity\\" . ucfirst($this->name);
        $this->form = $this->moduloName . "\Form\\" . ucfirst($this->name);
        $this->service = $this->moduloName . "\Service\\" . ucfirst($this->name);
        $this->controller = $this->name ."s";
        $this->route = "app/default";   
    }
    
    
    /**
     * Faz listagem dos dados baseado nos parametros passados
     * @param array $filtro
     * @param array $orderBy
     * @param array $list
     * @return \Zend\View\Model\ViewModel | no return
     */
    public function indexAction(array $filtro = [],array $orderBy = [], $list = []) {
        if (empty($list)) {
            $list = $this->getEm()
                    ->createQueryBuilder()
                    ->select('e')
                    ->from($this->entity, 'e');
            //Montar Filtros
            if(!empty($filtro)){
                $and = '';
                $where = '';
                foreach ($filtro as $key => $value) {
                    $where .= $and . ' e.' . $key . ' = :' . $key ;
                    $and = ' AND';
                }
                $list->where($where)
                     ->setParameters($filtro);
            }
            //Montar Ordenação
            foreach ($orderBy as $key => $value) {
                $list->addOrderBy('e.' . $key,$value);
            }
        }

        $this->page = $this->params()->fromRoute('page');
        
        $doctrinePaginator = new DoctrinePaginator($list);
        $paginatorAdapter = new PaginatorAdapter($doctrinePaginator);
        $this->paginator = new Paginator($paginatorAdapter);
        $this->paginator->setCurrentPageNumber($this->page);
        $this->paginator->setDefaultItemCountPerPage(10);
        $this->paginator->setPageRange(20);
        if ($this->render) {
            return $this->makeView(['data' => $this->paginator, 'page' => $this->page]);
        }
    }

    public function logedAction() {
        return new ViewModel();
    }

    public function cadastroAction() {
        return $this->view;
    }

    public function newAction() {
        $form = new $this->form();
        $request = $this->getRequest();
        if ($request->isPost()) {
            
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->insert($request->getPost()->toArray());
                
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }
        $data['titulo'] = 'Novo ' . $this->name;
        $data['action'] = 'new';

        return $this->makeView(compact("form","data"),TRUE, $this->getPathViewDefault() . 'form.phtml');
    }

    public function editAction() {
        $form = new $this->form();
        $request = $this->getRequest();

        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));

        if ($this->params()->fromRoute('id', 0)) {
            $form->setData($entity->toArray());
        }

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray());
                
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        $data['titulo'] = 'Editando ' . $this->name;
        $data['action'] = 'edit';
        
        return $this->makeView(compact("form","data"),TRUE, $this->getPathViewDefault() . 'form.phtml');
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
    protected function makeView($params,$terminal=true,$layout=''){
        $this->view = new ViewModel($params);
        $this->view->setTerminal($terminal);
        if(!empty($layout)){            
            $this->view->setTemplate($layout);
        }
        return $this->view;
    }
    
    /**
     * Pega o caminho padrão para os arquivos phtml do controller atual
     * @return string
     */
    protected function getPathViewDefault() {
        return strtolower($this->moduloName) . "/" . $this->controller . "/";
    }
    
    /**
     * Setar o controller para retorna ou não um view para tela
     * @param boolean $render default TRUE
     */
    public function setRender($render) {
        $this->render = $render;
    }

    /**
     * Guardar ou recuperar dados dos filtros para paginação
     * Ao fazer uma pesquisa com filtros os filtros é salvo em cache
     * Ao trocar de pagina e não existir o Post os filtros salvo anteriormente é recuperado
     * @return array 
     */
    public function filtrosDaPaginacao(){
        //
        $this->sc = new SessionContainer($this->moduloName);
        $post = $this->getRequest()->isPost();
        if(is_int($this->params()->fromRoute('page')) AND $post){
            $data = $this->getRequest()->getPost()->toArray();
            $this->sc->data = $data;
        }
        if (is_array($this->sc->data)){
            return $this->sc->data;            
        }else{
            return [];
        }
    }

}
