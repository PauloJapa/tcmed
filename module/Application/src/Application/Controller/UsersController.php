<?php

namespace Application\Controller;


class UsersController extends CrudController
{

    public function __construct() {
        parent::__construct('user');
    }
    
}

