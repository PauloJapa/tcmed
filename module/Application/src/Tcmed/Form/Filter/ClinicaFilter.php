<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da Funcao
 *
 */
class FuncaoFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('razaoSocial');  
        $this->notEmpty('fantasiaClinica');  
        $this->notEmpty('cnpj');  
        $this->notEmpty('status');  
        
    }
}
