<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of SetorFuncionariosController
 *
 */
class SetorFuncionariosController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('setorFuncionario','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(TRUE);
    }

}
