<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MessengerController extends CrudController
{

    public function __construct() {
        parent::__construct('messenger');                
    }
    
    public function indexAction()
    {
        return $this->makeView([]);
    }


}

