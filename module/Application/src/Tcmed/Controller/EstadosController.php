<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of EstadosController
 * @author Allan Davini
 */
class EstadosController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('estado','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
