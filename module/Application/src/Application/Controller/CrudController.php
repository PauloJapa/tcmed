<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Paginator\Paginator,
    Doctrine\ORM\Tools\Pagination\Paginator as DoctrinePaginator,
    DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as PaginatorAdapter;

use Application\View\Helper\UserIdentity;

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
    protected $routeAjax;
    protected $controller;
    protected $user;
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
    /**
     *
     * @var boolean 
     */
    protected $render = TRUE;
    /**
     *
     * @var boolean
     */
    protected $haveServiceLocatorService = FALSE;
    /**
     *
     * @var boolean 
     */
    protected $formWithEntityManager = FALSE;
    
    public function __construct($name='',$module='Application') {
        $this->name = ($name);
        $this->moduloName = $module;  
        $this->entity = $this->moduloName . "\Entity\\" . ucfirst($this->name);
        $this->form = $this->moduloName . "\Form\\" . ucfirst($this->name);
        $this->service = $this->moduloName . "\Service\\" . ucfirst($this->name);
        $this->controller = $this->name ."s";
        $this->route = "app/default";   
        $this->routeAjax = "app/ajax";   
    }

    public function logedAction() {
        return new ViewModel();
    }

    public function cadastroAction() {
        return $this->view;
    }
        
    /**
     * Faz listagem dos dados baseado nos parametros passados
     * @param array $filtro
     * @param array $orderBy
     * @param array $list
     * @return \Zend\View\Model\ViewModel | no return
     */
    public function indexAction(array $filtro = [],array $orderBy = [], $list = [], $quantPag = 10) {
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
                    $where .= $and . ' e.' . $key . ' LIKE :' . $key ;
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
        $this->paginator->setDefaultItemCountPerPage($quantPag);
        $this->paginator->setPageRange(20);
        $dataView = $this->getDataView('Exibindo ' . $this->name);
        $form = new \Application\Form\FormFilter;
        if ($this->render) {
            return $this->makeView(['data' => $this->paginator, 'page' => $this->page, 'dataView' => $dataView, 'form' => $form]);
        }
    }

    public function newAction() {
        $form = $this->getForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getService();
                $service->insert($this->getDataWeb($request));
                
                return $this->setRedirect();
            }
        }
        $dataView = $this->getDataView('Novo ' . $this->name, 'new');

        return $this->makeView(compact("form","dataView"), $this->getPathViewDefault() . 'form.phtml');
    }

    public function editAction() {
        $form = $this->getForm();
        $request = $this->getRequest();

        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));

        if ($this->params()->fromRoute('id', 0)) {
            $form->setData($entity->toArray());
        }

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getService();
                $service->update($this->getDataWeb($request,'editedBy'));
                return $this->setRedirect();
            }
        }

        $dataView = $this->getDataView('Editando ' . $this->name, 'edit');
        
        return $this->makeView(compact("form","dataView"),$this->getPathViewDefault() . 'form.phtml');
    }
    
    public function getService() {
        if($this->haveServiceLocatorService){
            return $this->getServiceLocator()->get($this->service);
        }
        return new $this->service($this->getEm());
    }
    
    public function getForm() {
        if($this->formWithEntityManager){
            return new $this->form($this->getEm());
        }
        return new $this->form();
    }
    
    /**
     * Seta se a instancia do servico desse controller vem do service locator ou 
     * Se instancia uma classe padrão com entity manager
     * Padrão é um serviço padrão com entity manager
     * @param boolean $haveServiceLocatorService
     * @return \Application\Controller\CrudController
     */
    public function setHaveServiceLocatorService($haveServiceLocatorService) {
        $this->haveServiceLocatorService = $haveServiceLocatorService;
    }

    /**
     * Seta se a instancia do form desse controller com ou sem entity manager 
     * Padrão é sem entity Manager
     * @param boolean $formWithEntityManager
     * @return \Application\Controller\CrudController
     */
    public function setFormWithEntityManager($formWithEntityManager) {
        $this->formWithEntityManager = $formWithEntityManager;
    }

     /**
     * Pegar os dados do formulario e acrecenta os id do usuario que esta trabalhando no registro
     * @param \Zend\Http\Request $request
     * @param string $option
     * @return array
     */
    public function getDataWeb(\Zend\Http\Request $request, $option='createBy') {
        $data = $request->getPost()->toArray();
        $user = $this->getUser();
        if($user){
            $data[$option] = $user['idUsuario'];
            $data['dataUser'] = $user;
        }
        return $data;
    }

    public function deleteAction() {
        $service = $this->getService();
        if ($service->delete($this->params()->fromRoute('id', 0))) {
            return $this->setRedirect();
        }
    }
    
    /**
     * Define se o redirecionamento vai ter parametros para dizer se tem o ajax
     * @param array $param
     * @return \Response
     */    
    public function setRedirect($param=[]) {
        $param['action'] = isset($param['action'])? $param['action']:'index';
        $param['controller'] = isset($param['controller'])? $param['controller']:$this->controller;
        if($this->getTerminalBoolean()){
            return $this->redirect()->toRoute($this->routeAjax, array('controller' => $param['controller'], 'action' => $param['action'], 'ajax'=> $this->getTerminalStr()));
        }else{
            return $this->redirect()->toRoute($this->route, array('controller' => $param['controller'], 'action' => $param['action']));
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
     * Pode passar o segundo argumento como string que será colocado na var $layout
     * @param array   $params
     * @param boolean $terminal 
     * @param string  $layout
     * @return Zend\View\Model\ViewModel
     */
    protected function makeView($params,$terminal='',$layout=''){        
        if (2 == func_num_args() && !is_bool($terminal)) {
            $layout = $terminal;
            $terminal = '';
        }
        if(empty($terminal)){
            $terminal = $this->getTerminalBoolean();
        }
        $params['dataView']['ajax'] = $terminal;
        $this->view = new ViewModel($params);
        $this->view->setTerminal($terminal);
        if(!empty($layout)){            
            $this->view->setTemplate($layout);
        }
        return $this->view;
    }
    
    /**
     * Procura por parametros que indicam se ajax ou não
     * @return boolean
     */
    protected function getTerminalBoolean(){
        if(isset($_GET['ajax']) AND $_GET['ajax'] == 'ok'){
            return TRUE;        
        }
        if($this->params()->fromRoute('ajax', 'no') == 'ok'){
            return TRUE;        
        }
        return FALSE;        
    }
    
    /**
     * retorna uma string para montagem de url com parametro ajax
     * @return string
     */
    protected function getTerminalStr(){
        if($this->getTerminalBoolean()){
            return 'ok';
        }
        return 'no';
    }
    
     /**
     * Pega o caminho padrão para os arquivos phtml do controller atual
     * @return string
     */
    protected function getPathViewDefault($controller='') {
        if(empty($controller)){
            $controller = $this->controller;
        }
        $arr = preg_split('/(?=[A-Z])/',$controller);
        if(count($arr) > 1){
            $controller = '';
            foreach ($arr as $key => $value) {
                $controller .=  (($key > 0)? '-' : '') . strtolower($value);
            }
        }
        return strtolower($this->moduloName) . "/" . $controller . "/";
    }
    
    protected function getDataView($titulo='', $action = 'index') {
        return [
            'titulo' => $titulo,
            'action' => $action,
        ];
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

    public function getUser(){
        if(!is_null($this->user)){
            return $this->user;
        }
        $user = new UserIdentity();
        $this->user = $user();
        return $this->user;
    }
    
    
    /**
     * 
     * Configura um chamada para o repositorio que
     * Faz uma busca no BD pela requisição Ajax com parametro de busca
     * Na view retorna os dados no formato texto para o js exibir para o usuario
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function autoCompAction(){
        $subOpcao = $this->getRequest()->getPost('subOpcao','');
        $autoComp = $this->getRequest()->getPost('autoComp');
        $param = trim($this->getRequest()->getPost('data'));
        
        $repository = $this->getEm()->getRepository($this->entity);
        $resultSet = $repository->autoComp($param .'%');
        if (!$resultSet) {// Caso não encontre nada ele tenta pesquisar em toda a string
            $resultSet = $repository->autoComp('%' . $param . '%');
        }
        // instancia uma view sem o layout da tela
        return $this->makeView(compact("resultSet","subOpcao"),TRUE);

    /*    
        $subOpcao = $this->getRequest()->getPost('subOpcao','');
        $autoComp = $this->getRequest()->getPost('autoComp');
        $param = trim($this->getRequest()->getPost($autoComp,''));
        $repository = $this->getEm()->getRepository($this->entity);
        $resultSet = $repository->autoComp($param .'%');
        if (!$resultSet) {// Caso não encontre nada ele tenta pesquisar em toda a string
            $resultSet = $repository->autoComp('%' . $param . '%');
        }
        // instancia uma view sem o layout da tela
        return $this->makeView(compact("resultSet","subOpcao"),TRUE);
    */
    }
}
