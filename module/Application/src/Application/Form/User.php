<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form;

/**
 * Description of User
 *
 * @author Paulo Watakabe
 */
class User extends AbstractForm{
    
    
    public function __construct($name = 'user', $options = array()) {
        parent::__construct($name, $options);
        
//        $this->setInputFilter(new Filter\userFilter);
        
        $this->setInputHidden('idUser');
        
        $this->setInputText2('usuarioId', 'ID do usuario: ',['placeholder'=>'Valor numerico']);
        
        $this->setInputText2('nome', 'Nome: ',['placeholder'=>'Entre com o nome visivel no chat']);
        
        $selectOptionsTipo = ["online" => "Online","busy" => "Ocupado","offline" => "Ausente",];
        $this->setInputSelect('statusChat', 'Status no chat: ', $selectOptionsTipo,['placeholder'=>'Se é Online, Off, ausente e etc...']);
        
        $this->setInputText2('statusMsg', 'Mensagem de Status: ',['placeholder'=>'Digite aqui']);       
        
        $selectOptions = ["A" => "Ativo","C" => "Cancelado"];
        $this->setInputSelect('status', 'Status: ', $selectOptions);  
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar: ');
        
    }
}
