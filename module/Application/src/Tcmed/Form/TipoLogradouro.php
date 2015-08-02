<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of TipoLogradouro
 *
 */
class TipoLogradouro extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'TipoLogradouro', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('TipoLogradouro', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\TipoLogradouroFilter);
        
        $this->setInputHidden('idTipologradouro');
        
        $this->setSimpleText('tipo');
        
        $this->setSimpleText('status');
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
}
