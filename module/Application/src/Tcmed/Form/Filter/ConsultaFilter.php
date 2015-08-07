<?php

/*
 * To change this license 
 */

namespace Tcmed\Form\Filter;

/**
 * Validação do form da Consulta
 * @author Allan Davini
 */
class ConsultaFilter extends \Application\Form\Filter\AbstractFilter{
    
    public function __construct() {
        
        $this->notEmpty('idFuncionario');  
        $this->notEmpty('status');  
        $this->notEmpty('questionario');  
        $this->notEmpty('cargoCargo');  
        $this->notEmpty('clinicaClinica');  
        $this->notEmpty('medicoMedico');  
        $this->notEmpty('setorSetor');  
        
    }
}
