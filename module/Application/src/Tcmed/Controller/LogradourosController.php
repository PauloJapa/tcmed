<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of LogradourosController
 * @author Allan Davini
 */
class LogradourosController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('logradouro','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
