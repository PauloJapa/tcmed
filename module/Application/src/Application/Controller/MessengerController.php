<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MessengerController extends CrudController {

    public function __construct() {
        parent::__construct('messenger');
    }

    public function getHtmlAction() {
        return $this->makeView([]);
    }

    public function receiveContactsAction() {
        $repository = $this->getEm()->getRepository($this->moduloName . "\Entity\Contato");
        $data = $repository->getMyContactAndGrupos($this->getUser());
        
        return $this->makeView(compact("data"));
    }

    public function receiveStatusAction() {
        return $this->makeView([]);
    }

    public function sendStatusAction() {
        return $this->makeView([]);
    }

    public function receiveMsgAction() {
        $request = $this->getRequest();
        $msgdata = $request->getPost();
        
        $service = $this->getService();
        $mensagens = $service->receiveMensagem($msgdata);
                                
        return $this->makeView(compact('mensagens'));
    }

    public function sendMsgAction() {
        $request = $this->getRequest();
        $msgdata = $request->getPost();
        
        $service = $this->getService();
        $service->sendMensagem($msgdata);
        
        return $this->makeView([]);
    }
    
    public function whoiamAction(){
        $service = $this->getService();
        $meUser = $service->whoIam($this->getUser());
        
        return $this->makeView(compact('meUser'));
    }

}
