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
        
        $this->setInputHidden('userUser');
        $attributes = ['placeholder' => 'Digite aqui nome PESQUISAR!',
                       'onKeyUp' => 'autoCompUser();',
                       'autoComplete'=>'off']; 
        $this->setInputText2('userUser_nome', 'User: ',$attributes);
        
        $this->setInputHidden('grupoGrupo');
        $this->setInputText2('grupoGrupo_nome', 'Grupo: ',['placeholder'=>'nome']);
        
        $this->setInputHidden('contatoUser');
        $this->setInputText2('contatoUser_nome', 'Contato: ',['placeholder'=>'nome']);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar: ');
        
    }
}
