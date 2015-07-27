<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form do Estado
 *
 */
class EstadoFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('nomeEstado');  
        $this->notEmpty('uf');  
        $this->notEmpty('status');  
        $this->notEmpty('pais');  
        
    }
}
