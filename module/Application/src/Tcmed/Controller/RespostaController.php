<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of RespostaController
 * @author Allan Davini
 */
class RespostaController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('resposta','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
