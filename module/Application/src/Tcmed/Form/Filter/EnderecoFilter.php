<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da Endereco
 * @author Allan Davini
 */
class EnderecoFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('numero');  
        $this->notEmpty('complemento');  
        $this->notEmpty('status');  
        $this->notEmpty('logradouro');  
        
    }
}
