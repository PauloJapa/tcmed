<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form\Filter;

/**
 * Validação do form do Users
 *
 * @author Paulo Cordeiro Watakabe <watakabe05@gmail.com>
 */
class userFilter extends AbstractFilter{
    
    public function __construct() {
        
        $this->add(array(
            'name' => 'nome_usuario',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array('name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            'isEmpty' => 'Não poder ficar em branco',
                        ),
                    )
                ),
            )
        ));
        
        $validator = new \Zend\Validator\EmailAddress();
        $validator->setOptions(array('domain'=>false));
        
        $this->add(array(
            'name' => 'email_usuario',
            'validators' => array($validator)
        ));
        
        
        $this->add(array(
            'name' => 'senha_usuario',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array('name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            'isEmpty' => 'Não poder ficar em branco',
                        ),
                    )
                ),
            )
        ));
        
        
        $this->add(array(
            'name' => 'confirmation',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            'isEmpty' => 'Não poder ficar em branco',
                        ),                        
                    ),
                    'name' => 'Identical',
                    'options' => array(
                        'token' => 'senha_usuario',
                    ),
                ),
            )
        ));
    }
}
