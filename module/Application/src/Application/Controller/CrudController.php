<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CrudController extends AbstractActionController
{
    
    protected $view;
    
    public function __construct() {
        $this->view = new ViewModel();
        $this->view->setTerminal(true);
    }

    public function indexAction()
    {
        return new ViewModel();
    }

    public function logedAction()
    {
        return new ViewModel();
    }

    public function cadastroAction()
    {
        return $this->view;
    }


}

