<?php

/*
 * License
 */

namespace Application\Form;

/**
 * Description of Contato
 *
 * @author Paulo Watakabe <email>watakabe05@gmail.com</email>
 */
class Contato extends AbstractForm{
    
    
    public function __construct($name = 'contato', $options = array()) {
        parent::__construct($name, $options);
        
        $this->setInputFilter(new Filter\contatoFilter);
        
        $this->setInputHidden('idContato');
        
        $this->setInputText2('userUser', 'User: ',['placeholder'=>'id']);
        
        $this->setInputText2('grupoGrupo', 'Grupo: ',['placeholder'=>'id']);
        
        $this->setInputText2('contatoUser', 'Contato: ',['placeholder'=>'id']);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar: ');
        
    }
}
