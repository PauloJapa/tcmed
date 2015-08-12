<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da Epi
 * @author Allan Davini
 */
class EpiFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('epi');  
        $this->notEmpty('status');  
        $this->notEmpty('idModeloseguranca');  
        
    }
}
