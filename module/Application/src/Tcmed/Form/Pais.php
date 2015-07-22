<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Pais
 *
 */
class Pais extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'Pais', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Pais', $options);
        
        $this->setInputFilter(new Filter\PaisFilter);
        
        $this->setSimpleText('idPais');
        
        $this->setSimpleText('nomePais');
        
        $this->setSimpleText('sigla');
        
        $this->setSimpleText('codigo');
        
        $this->setSimpleText('status');
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
}
