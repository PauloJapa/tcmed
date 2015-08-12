<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da Setor
 *
 */
class SetorFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        $this->notEmpty('ANYTHING');
    }
}
