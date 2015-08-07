<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da Questionario
 * @author Allan Davini
 */
class QuestionarioFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('status');  
        $this->notEmpty('questionariocol');  
        $this->notEmpty('clinica');  
        $this->notEmpty('pergunta');  
        
    }
}
