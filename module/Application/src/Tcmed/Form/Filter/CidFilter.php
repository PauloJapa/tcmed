<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da Cid
 *
 */
class CidFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('descricaoCid');  
        $this->notEmpty('numeroCid');  
        $this->notEmpty('status');  
        
    }
}
