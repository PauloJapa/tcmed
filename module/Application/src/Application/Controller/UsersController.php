<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Controller;

/**
 * Description of UsersController
 *
 * @author user
 */
class UsersController extends CrudController{

    public function __construct() {
        parent::__construct();
        $this->entity = $this->moduloName . "\Entity\Usuario";
        $this->form = $this->moduloName . "\Form\User";
        $this->service = $this->moduloName . "\Service\User";
        $this->controller = "users";
        $this->route = "app/default";
    }

    public function editAction() {        
        $form = new $this->form();        
        $request = $this->getRequest();
        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));

        if ($this->params()->fromRoute('id', 0)) {
            $array = $entity->toArray();
            unset($array['password']);
            $form->setData($array);
        }


        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }

        $view = $this->makeView(compact("form"));
        $view->setTemplate("application/users/new.phtml");
        return $view;
    }

}
