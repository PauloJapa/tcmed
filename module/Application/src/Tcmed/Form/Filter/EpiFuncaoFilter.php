<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da EpiFuncao
 * @author Allan Davini
 */
class EpiFuncaoFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('eficaz');  
        $this->notEmpty('idEpi');  
        $this->notEmpty('idFuncao');  
        $this->notEmpty('idRisco');  
        
    }
}
