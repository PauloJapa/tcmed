<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of ConsultasController
 *
 */
class ConsultasController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('consulta','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
