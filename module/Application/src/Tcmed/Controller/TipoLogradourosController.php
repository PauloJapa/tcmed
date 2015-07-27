<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of TipoLogradourosController
 *
 */
class TipoLogradourosController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('tipoLogradouro','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
