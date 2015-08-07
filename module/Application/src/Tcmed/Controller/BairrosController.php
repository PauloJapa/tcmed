<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of BairrosController
 * @author Allan Davini
 */
class BairrosController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('bairro','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
