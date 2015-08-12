<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da FuncaoEpc
 * @author Allan Davini
 */
class FuncaoEpcFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('eficaz');  
        $this->notEmpty('idEpc');  
        $this->notEmpty('idFuncao');  
        $this->notEmpty('idRisco');  
        
    }
}
