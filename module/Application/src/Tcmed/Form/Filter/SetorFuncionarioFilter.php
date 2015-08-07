<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da SetorFuncionario
 * @author Allan Davini
 */
class SetorFuncionarioFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('funcionarioIdFuncionario');  
        $this->notEmpty('setorSetor');  
        
    }
}
