<?php

/*
 * License
 */

namespace Application\Form\Filter;

/**
 * Validação do form do Grupo
 *
 * @author Paulo Cordeiro Watakabe <watakabe05@gmail.com>
 */
class grupoFilter extends AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('nome');  
        
        $this->notEmpty('status');        
        
    }
}
