<?php

/*
 * License
 */

namespace Application\Form\Filter;

/**
 * Validação do form do Contato
 *
 * @author Paulo Cordeiro Watakabe <watakabe05@gmail.com>
 */
class contatoFilter extends AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('contatoIdUser');  
        
    }
}
