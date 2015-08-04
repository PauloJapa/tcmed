<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of SetoresController
 *
 */
class SetoresController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('setor','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->controller = 'setores';
    }

}
