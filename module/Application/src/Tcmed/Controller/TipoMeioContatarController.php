<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of CidadesController
 *
 */
class TipoMeioContatarController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('tipoMeioContatar','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->controller = 'tipoMeioContatar';
        $this->setFormWithEntityManager(true);
    }

}
