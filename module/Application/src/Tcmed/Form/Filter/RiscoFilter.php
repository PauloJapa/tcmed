<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form do Risco
 *
 */
class RiscoFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('descricao');
        $this->notEmpty('dtInclusao');
        $this->notEmpty('status');
    }
}
