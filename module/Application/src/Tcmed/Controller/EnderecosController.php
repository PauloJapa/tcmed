<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of EnderecosController
 *
 */
class EnderecosController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('endereco','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
