<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of RiscosController
 */
class RiscosController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('risco','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
    }

}
