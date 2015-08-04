<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of PerguntasController
 *
 */
class PerguntasController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('pergunta','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
    }

}
