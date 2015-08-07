<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of EpisController
 */
class EpisController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('epi','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
    }

}
