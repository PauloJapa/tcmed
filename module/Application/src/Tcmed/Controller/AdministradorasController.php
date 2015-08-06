<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;
use \Application\Controller\CrudController;

/**
 * Description of AdministradorasController
 *
 */
class AdministradorasController extends CrudController {

    public function __construct() {
        parent::__construct('administradora','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
