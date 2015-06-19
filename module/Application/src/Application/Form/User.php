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
        
        $this->setInputText2('nome_usuario', 'Nome: ',['placeholder'=>'Entre com o nome']);
        
        $this->setInputText2('nickname', 'Login: ',['placeholder'=>'Entre com o Login']);
        
        $this->setInputText2('senha_usuario', 'Password: ',['placeholder'=>'Entre com o senha']);
        
        $this->setInputText2('confirmation', 'Redigite: ',['placeholder'=>'Redigite a senha']);
        
        $this->setInputText2('email_usuario', 'Email: ',['placeholder'=>'Entre com o email']);
        
        $selectOptions = ["A" => "Ativo","C" => "Cancelado"];
        $this->setInputSelect('situacao', 'Status: ', $selectOptions);
        
        $this->setInputText('lembreteSenha', 'Lembrete: ',['placeholder'=>'Entre com o lembrete para senha']);
        
        $selectOptionsTipo = ["admin" => "Administrador","guest" => "Visitante","recep" => "Recepção","adm" => "Adiministradora"];
        $this->setInputSelect('tipo', 'Tipo de Usuario: ', $selectOptionsTipo,['placeholder'=>'Se é Admin, Guest, recepção e etc...']);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar: ');
        
    }
}
