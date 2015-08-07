<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of CidsController
 * @author Allan Davini
 */
class CidsController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('cid','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
    }

}
