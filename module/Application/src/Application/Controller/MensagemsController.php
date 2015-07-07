<?php

namespace Application\Controller;


class MensagemsController extends CrudController
{

    public function __construct() {
        parent::__construct('mensagem');
    }

    
    public function indexAction() {
        return parent::indexAction([],['texto' => 'ASC']);        
    }
    
}

