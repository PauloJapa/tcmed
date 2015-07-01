<?php

namespace Application\Controller;

class AppRolesController extends CrudController {

    public function __construct() {
        parent::__construct('appRole');
        $this->setFormWithEntityManager(TRUE);
    }

}
