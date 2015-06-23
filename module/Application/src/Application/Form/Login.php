<?php

namespace Application\Form;


class Login  extends AbstractForm
{

    public function __construct($name = 'Login', $options = array()) {
        parent::__construct($name, $options);
        
        $this->setInputFilter(new Filter\loginFilter);

        $this->setInputText2('email', 'Email:',['placeholder'=>'Entre com o Email']);
        $this->setInputText2('password', 'Senha:',['placeholder'=>'Entre com a senha']);
        
        $this->setInputCheckbox('remember', 'Lembrar:', ['checked_value' => 'remember','unchecked_value' => 'noremember']);

        $this->setInputSubmit('submit', 'Entrar no Sistema', [], FALSE);                      
       
    }
    
}
