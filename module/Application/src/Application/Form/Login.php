<?php

namespace Application\Form;


class Login  extends AbstractForm
{

    public function __construct($name = null, $options = array()) {
        parent::__construct('Login', $options);

        $this->setInputText2('email', 'Email :',['placeholder'=>'Entre com o Email']);
        $this->setInputText2('password', 'Senha :',['placeholder'=>'Entre com a senha']);

        $this->setInputSubmit('submit', 'Entrar no Sistema', [], FALSE);                      
       
    }
    
}
