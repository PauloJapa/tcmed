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
class ClinicaController extends CrudController {

    public function __construct() {
        parent::__construct('clinica','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->controller = 'clinica';
        $this->setFormWithEntityManager(true);
    }

}
