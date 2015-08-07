<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Descricao
 * @author Allan Davini
 */
class Descricao extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'Descricao', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Descricao', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\DescricaoFilter);
        
        $this->setInputHidden('idDescricao');
        
        $this->setSimpleText('descricao');
        
        $this->setSimpleText('status');
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
}
