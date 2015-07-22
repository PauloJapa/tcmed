<?php

/*
 * To change this license 
 */

namespace Endereco\Controller;

/**
 * Description of EnderecosController
 *
 * @author Paulo Watakabe
 */
class EnderecosController extends \Application\Controller\CrudController {

    public function __construct() {
        parent::__construct('endereco','Endereco');
        $this->route = 'end/default'; 
        $this->routeAjax = "end/ajax"; 
    }

}
