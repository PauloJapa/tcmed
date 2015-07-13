<?php

/*
 * To change this license 
 */

namespace Application\Form;

/**
 * Description of Teste
 *
 * @author Paulo Watakabe <email>watakabe05@gmail.com</email>
 */
class Teste extends AbstractForm{
    
    
    public function __construct($name = 'Teste', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Teste', $options);
        
        $this->setInputFilter(new Filter\TesteFilter);
        
        $this->setInputHidden('idTeste');
        
        $this->setSimpleText('campo1');
        $this->setSimpleText('campo2');
        $this->setSimpleText('campo3');
        
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar: ');
        
    }
    
}
