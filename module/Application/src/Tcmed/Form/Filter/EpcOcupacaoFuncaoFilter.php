<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da EpcOcupacaofuncao
 * @author Allan Davini
 */
class EpcOcupacaofuncaoFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('eficaz');  
        $this->notEmpty('idOcupacaofuncao');  
        $this->notEmpty('idEpc');  
        
    }
}
