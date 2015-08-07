<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da Resposta
 * @author Allan Davini
 */
class RespostaFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('Resposta');  
        $this->notEmpty('respostaCheck');  
        $this->notEmpty('cidadeBairro');  
        $this->notEmpty('Pergunta');  
        $this->notEmpty('consultaConsulta');  
        
    }
}
