<?php

namespace Application\Controller;

use Application\Form\User as FormUser;

class IndexController extends CrudController {

    public function registerAction() {
        $form = new FormUser();
        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get("Application\Service\User");
                $entity = $service->insert($request->getPost()->toArray());
                if ($entity) {
                    $fm = $this->flashMessenger()
                            ->setNamespace("Application")
                            ->addMessage("Usuario cadastrado com sucesso");
                }
                //return $this->redirect()->toRoute('user-register');
            }
        }

        $messages = $this->flashMessenger()
                ->setNamespace("Application")
                ->getMessages();

        $view = new ViewModel(array('form' => $form, 'messages' => $messages));
        $view->setTerminal(true);
        return $view;
    }

    public function activateAction() {
        $activationKey = $this->params()->fromRoute('key');

        $userService = $this->getServiceLocator()->get('SONUser\Service\User');
        $result = $userService->activate($activationKey);

        if ($result)
            $view = new ViewModel(array('user' => $result));
        else
            $view = new ViewModel();

        $view->setTerminal(true);
        return $view;
    }

    public function indexAction() {
        return new ViewModel();
    }

    public function logedAction() {
        return new ViewModel();
    }

    public function cadastroAction() {
//        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
//        
//        $user = new Usuario();
//        $user->setNomeUsuario('Administrador')
//                ->setEmailUsuario('admin@admin.com.br')
//                ->setSenhaUsuario('123')
//                ->setSituacao('A');        
//        $em->persist($user);
//        $em->flush();

        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }

}
