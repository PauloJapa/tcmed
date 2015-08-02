<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form do Pais
 *
 */
class PaisFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('nomePais');  
        $this->notEmpty('sigla');  
        $this->notEmpty('codigo');  
        $this->notEmpty('status');  
        
    }
}
