<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of PaisController
 *
 */
class PaisController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('pais','Endereco');
        $this->route = 'end/default'; 
        $this->routeAjax = "end/ajax"; 
    }

}
