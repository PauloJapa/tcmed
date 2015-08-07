<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Cid
 * @author Allan Davini
 */
class Cid extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'Cid', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Cid', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\CidFilter);
        
        $this->setInputHidden('idCid');
        $this->setSimpleText('descricaoCid');
        $this->setSimpleText('numeroCid');
        $this->setSimpleText('status');
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
}
