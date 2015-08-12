<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;
use \Application\Controller\CrudController;

/**
 * Description of CidsController
 *
 */
class CidsController extends CrudController {

    public function __construct() {
        parent::__construct('cid','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
