<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da OcupacaofuncaoEpi
 * @author Allan Davini
 */
class OcupacaofuncaoEpiFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('eficaz');  
        $this->notEmpty('idOcupacaofuncao');  
        $this->notEmpty('idEpi');  
        
    }
}
