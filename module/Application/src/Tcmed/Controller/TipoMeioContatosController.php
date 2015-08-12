<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;
use \Application\Controller\CrudController;

/**
 * Description of TipoMeioContatosController
 *
 */
class TipoMeioContatosController extends CrudController {

    public function __construct() {
        parent::__construct('tipoMeioContato','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
