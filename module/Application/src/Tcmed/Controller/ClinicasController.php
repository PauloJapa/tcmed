<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;
use \Application\Controller\CrudController;

/**
 * Description of ClinicaController
 *
 */
class ClinicasController extends CrudController {

    public function __construct() {
        parent::__construct('clinica','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
