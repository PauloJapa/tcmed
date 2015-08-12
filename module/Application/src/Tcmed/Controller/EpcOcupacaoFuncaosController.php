<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of EpcOcupacaofuncaosController
 * @author Allan Davini
 */
class EpcOcupacaofuncaosController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('epcocupacaofuncao','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
