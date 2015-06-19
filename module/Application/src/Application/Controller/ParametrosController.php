<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ParametrosController extends CrudController
{
    
    public function __construct() {
        parent::__construct('parametros');
        $this->controller = $this->name ;
    }

}

