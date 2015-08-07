<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da Contato
 * @author Allan Davini
 */
class ContatoFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('nomeContato');  
        $this->notEmpty('status');  
        $this->notEmpty('rg');  
        $this->notEmpty('cpf');  
        $this->notEmpty('endereco');  
        
    }
}
