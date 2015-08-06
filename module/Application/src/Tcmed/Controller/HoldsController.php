<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of HoldsController
 *
 */
class HoldsController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('hold','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
