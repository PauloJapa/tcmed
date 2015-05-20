<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractActionController
{

    public function indexAction()
    {
        return $this->redirect()->toRoute('home', array('controller'=>'index','action'=>'index'));
        
        //return new ViewModel();
    }


}

