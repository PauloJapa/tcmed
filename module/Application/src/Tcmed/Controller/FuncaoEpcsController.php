<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of FuncaoEpcsController
 * @author Allan Davini
 */
class FuncaoEpcsController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('FuncaoEpc','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
