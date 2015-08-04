<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of FuncaoController
 *
 */
class FuncaoController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('funcao','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->controller = 'funcao';
        $this->setFormWithEntityManager(true);
    }

}
