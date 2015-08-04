<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of DescricaoController
 *
 */
class DescricaoController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('descricao','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->controller = 'descricao';
    }

}
