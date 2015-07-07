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
 * @author Paulo Watakabe <email watakabe05@gmail.com >
 */
class UsuariosController extends CrudController{

    public function __construct() {
        parent::__construct('usuario');
        $this->setFormWithEntityManager(TRUE);
    }

    public function editAction() {        
        $form = $this->getForm();        
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

                return $this->setRedirect();
            }
        }

        
        $dataView = $this->getDataView('Editando ' . $this->name, 'edit');
        
        return $this->makeView(compact("form","dataView"), $this->getPathViewDefault() . 'form.phtml');
    }

}
