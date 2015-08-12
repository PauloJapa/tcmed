<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da Risco
 * @author Allan Davini
 */
class RiscoFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('descricao');  
        $this->notEmpty('status');  
        $this->notEmpty('idModeloseguranca');  
        
    }
}
