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
        
        $this->setInputFilter(new Filter\userFilter);
        
        $this->setInputHidden('id');
        
        $this->setInputText('nome_usuario', 'Nome: ',['placeholder'=>'Entre com o nome']);
        
        $this->setInputText('nickname', 'Login: ',['placeholder'=>'Entre com o Login']);
        
        $this->setInputText2('senha_usuario', 'Password: ',['placeholder'=>'Entre com o senha']);
        
        $this->setInputText2('confirmation', 'Redigite: ',['placeholder'=>'Redigite a senha']);
        
        $this->setInputText('email_usuario', 'Email: ',['placeholder'=>'Entre com o email']);
        
        $selectOptions = ["A" => "Ativo","C" => "Cancelado"];
        $this->setInputSelect('situacao', 'Status: ', $selectOptions);
        
        $this->setInputText('lembreteSenha', 'Lembrete: ',['placeholder'=>'Entre com o lembrete para senha']);
        
        $this->setInputText('tipo', 'Tipo de Usuario: ',['placeholder'=>'Se é Admin, Guest, recepção e etc...']);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $radioOptions = ["A" => "Ativo","B" => "Bloqueado","C" => "Cancelado"];
        $this->setInputRadio('teste', 'testando radio', $radioOptions, ['disabled' => true]);
        
        $this->setInputCheckbox('teste2', 'test checkbox:', ['value' => 'pqp!'], ['disabled' => false]);
        
        $this->setInputMultiCheckbox('teste3', 'multi box', $radioOptions);
        
        $this->setInputTextArea('teste4', 'obs:');
                
        $this->setInputSubmit('submit', 'Salvar: ');
        
    }
}
