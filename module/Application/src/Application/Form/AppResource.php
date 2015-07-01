<?php

/*
 * To change this license 
 */

namespace Application\Form;

/**
 * Description of AppResource
 *
 * @author Paulo Watakabe <email>watakabe05@gmail.com</email>
 */
class AppResource extends AbstractForm{
    
    
    public function __construct($name = 'AppResource', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('AppResource', $options);
        
        $this->setInputFilter(new Filter\AppResourceFilter);
        
        $this->setInputHidden('idResource');
        
        $this->setInputText2('name', 'Nome: ',['placeholder'=>'Entre com o nome']);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar: ');
        
    }
    
}
