<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of CidadesController
 * @author Allan Davini
 */
class CidadesController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('cidade','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
