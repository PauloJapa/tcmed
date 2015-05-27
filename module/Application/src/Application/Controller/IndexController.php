<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\Entity\Usuario ;

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
        
        $user = new Usuario();
        $user->setNomeUsuario('Administrador')
                ->setEmailUsuario('admin@admin.com.br')
                ->setSenhaUsuario('123')
                ->setSituacao('A');        
        $em->persist($user);
        $em->flush();
        
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }


}

