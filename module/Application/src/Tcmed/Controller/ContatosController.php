<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of ContatosController
 * @author Allan Davini
 */
class ContatosController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('contato','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
