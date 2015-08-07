<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da Descricao
 * @author Allan Davini
 */
class DescricaoFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('descricao');  
        $this->notEmpty('status');  
        
    }
}
