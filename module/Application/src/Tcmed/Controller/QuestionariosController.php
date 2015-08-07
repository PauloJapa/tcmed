<?php

/*
 * To change this license 
 */

namespace Tcmed\Controller;

/**
 * Description of QuestionarioController
 * @author Allan Davini
 */
class QuestionarioController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('questionario','Tcmed');
        $this->route = 'tcmed/default'; 
        $this->routeAjax = "tcmed/ajax"; 
        $this->setFormWithEntityManager(true);
    }

}
