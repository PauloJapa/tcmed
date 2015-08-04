<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Epi
 *
 */
class Epi extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'Epi', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Epi', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\EpiFilter);
        
        $this->setInputHidden('idEpi');
        $this->setSimpleText('epi');
        $this->setSimpleText('status');
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
}
