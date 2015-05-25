<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Doctrine\ORM\EntityManager ;

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
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
         //var_dump($em);
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }


}

