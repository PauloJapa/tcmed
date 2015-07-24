<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da TipoLogradouro
 *
 */
class TipoLogradouroFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('tipo');  
        $this->notEmpty('status');  
        
    }
}
