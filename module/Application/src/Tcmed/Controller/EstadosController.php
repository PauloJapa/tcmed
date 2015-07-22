<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of EstadosController
 *
 */
class EstadosController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('estado','Endereco');
        $this->route = 'end/default'; 
        $this->routeAjax = "end/ajax"; 
    }

}
