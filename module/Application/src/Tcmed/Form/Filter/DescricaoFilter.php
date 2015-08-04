<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da Bairro
 *
 */
class BairroFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('nomeBairro');  
        $this->notEmpty('status');  
        $this->notEmpty('cidadeBairro');  
        
    }
}
