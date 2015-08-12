<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;
use \Application\Controller\CrudController;

/**
 * Description of SetorsController
 *
 */
class SetorsController extends CrudController {

    public function __construct() {
        parent::__construct('Setor','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
