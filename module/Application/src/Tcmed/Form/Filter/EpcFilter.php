<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da Epc
 * @author Allan Davini
 */
class EpcFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('epc');  
        $this->notEmpty('status');  
        $this->notEmpty('idModeloseguranca');  
        
    }
}
