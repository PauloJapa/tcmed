<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da Funcao
 * @author Allan Davini
 */
class FuncaoFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('nomeFuncao');  
        $this->notEmpty('status');  
        $this->notEmpty('referencia');  
        $this->notEmpty('codFuncao');  
        $this->notEmpty('descricaoDescricao');  
        
    }
}
