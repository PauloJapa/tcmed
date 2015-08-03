<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of TipoMeioContatar
 *
 */
class TipoMeioContatar extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'TipoMeioContatar', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Estado', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\TipoMeioContatarFilter);
        
        $this->setInputHidden('idTipoMeioContatar');
        
        $this->setSimpleText('descricao');
        $this->setSimpleText('mascara');
        $this->setSimpleText('mascaraAux');
        $this->setSimpleText('status');
        
        $this->setInputSubmit('submit', 'Salvar');
    }
}
