<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da Logradouro
 * @author Allan Davini
 */
class LogradouroFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('nomeLogradouro');  
        $this->notEmpty('status');  
        $this->notEmpty('cep');  
        $this->notEmpty('bairroBairro');  
        $this->notEmpty('tipologradouroTipologradouro');  
        
    }
}
