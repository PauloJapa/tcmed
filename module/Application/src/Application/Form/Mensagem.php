<?php

/*
 * To change this license 
 */

namespace Application\Form;

/**
 * Description of Mensagem
 *
 * @author Paulo Watakabe <email>watakabe05@gmail.com</email>
 */
class Mensagem extends AbstractForm{
    
    
    public function __construct($name = 'Mensagem', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Mensagem', $options);
        
//        $this->setInputFilter(new Filter\MensagemFilter);
        
        $this->setInputHidden('idMensagem');
        
        $this->setInputTextArea('texto', 'Texto :');
        
        $this->setSimpleText('link');
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar: ');
        
    }
    
}
