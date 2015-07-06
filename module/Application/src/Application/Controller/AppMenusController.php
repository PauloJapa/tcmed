<?php

/*
 * To change this license 
 */

namespace Application\Controller;

/**
 * Description of AppMenu
 *
 * @author Paulo Watakabe
 */
class AppMenusController extends CrudController {

    public function __construct() {
        parent::__construct('appMenu');
        $this->setFormWithEntityManager(TRUE);
    }
    
    public function indexAction() {
        return parent::indexAction([],['ordem' => 'ASC']);
    }


}

