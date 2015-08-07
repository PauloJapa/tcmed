<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of PaisController
 * @author Allan Davini
 */
class PaisController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('pais','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->controller = 'pais';
    }

}
