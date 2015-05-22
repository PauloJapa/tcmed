<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

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
        
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }


}

