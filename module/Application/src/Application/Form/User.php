<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form;

use Zend\Form\Form;

/**
 * Description of User
 *
 * @author Paulo Watakabe
 */
class User extends Form{
    
    
    public function __construct($name = null, $options = array()) {
        parent::__construct('user',$options);
        
        $this->setInputFilter(new Filter\userFilter);
        
        $this->setAttribute('methos', 'post');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
        
        $nome = new \Zend\Form\Element\Text('nome_usuario');
        $nome->setLabel('Nome: ')
                ->setAttribute('placeholder','Entre com o nome');
        $this->add($nome);
        
        $email = new \Zend\Form\Element\Text('email_usuario');
        $email->setLabel('Email: ')
                ->setAttribute('placeholder','Entre com o email');
        $this->add($email);
        
        $password = new \Zend\Form\Element\Password('senha_usuario');
        $password->setLabel('Password: ')
                ->setAttribute('placeholder','Entre com a senha');
        $this->add($password);
        
        $confirmation = new \Zend\Form\Element\Password('confirmation');
        $confirmation->setLabel('Redigite: ')
                ->setAttribute('placeholder','Redigite a senha');
        $this->add($confirmation);
        
        $situacao = new \Zend\Form\Element\Text('situacao');
        $situacao->setLabel('Status: ')
                ->setAttribute('placeholder','A(ativo) C(cancelado)');
        $this->add($situacao);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn-success',
            ),
        ));
        
    }
}
