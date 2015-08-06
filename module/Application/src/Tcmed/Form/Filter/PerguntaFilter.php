<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form do Pergunta
 *
 */
class PerguntaFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('pergunta');
        $this->notEmpty('status');
    }
}
