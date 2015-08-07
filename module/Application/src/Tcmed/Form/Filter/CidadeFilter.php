<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da Cidade
 * @author Allan Davini
 */
class CidadeFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('nomeCidade');  
        $this->notEmpty('status');  
        $this->notEmpty('estadoEstado');  
        
    }
}
