<?php

/*
 * License
 */

namespace Application\Form;

/**
 * Description of Grupo
 *
 * @author Paulo Watakabe <email>watakabe05@gmail.com</email>
 */
class Grupo extends AbstractForm{
    
    
    public function __construct($name = 'grupo', $options = array()) {
        parent::__construct($name, $options);
        
        $this->setInputFilter(new Filter\grupoFilter);
        
        $this->setInputHidden('idGrupo');
        
        $this->setInputText2('nome', 'Nome: ',['placeholder'=>'Entre com o nome visivel no chat']);
        
        $selectOptionsTipo = ["online" => "onLine","offline" => "offLine","ausente" => "Ausente","busy" => "Ocupado"];
        $this->setInputSelect('statusChat', 'Status no chat: ', $selectOptionsTipo,['placeholder'=>'Se é Online, Off, ausente e etc...']);
        
        $this->setInputText2('statusMsg', 'Mensagem de Status: ',['placeholder'=>'Digite aqui']);       
        
        $selectOptions = ["A" => "Ativo","C" => "Cancelado"];
        $this->setInputSelect('status', 'Status: ', $selectOptions);  
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar: ');
        
    }
}
