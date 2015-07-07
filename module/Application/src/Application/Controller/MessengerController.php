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
        return $this->makeView([]);
    }

    public function receiveStatusAction() {
        return $this->makeView([]);
    }

    public function sendStatusAction() {
        return $this->makeView([]);
    }

    public function receiveMsgAction() {
        return $this->makeView([]);
    }

    public function sendMsgAction() {
        $request = $this->getRequest();
        $msgdata = $request->getPost();
        
        $repository = $this->getEm()->getRepository($this->entity);
        
        return $this->makeView([]);
    }

}
