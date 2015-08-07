<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of EpcsController
 * @author Allan Davini
 */
class EpcsController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('epc','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
    }

}
