<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of OcupacaofuncaoEpisController
 * @author Allan Davini
 */
class OcupacaofuncaoEpisController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('ocupacaofuncaoepi','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
