<?php

namespace Application\Form\Filter;

use Zend\InputFilter\InputFilter;


/**
 * AbstractFilter
 * Metodos abstraidos e encapsulados de filtro para usar no form
 * 
 * @author Paulo Cordeiro Watakabe <watakabe05@gmail.com>
 */
class AbstractFilter extends InputFilter {
    
    /**
     * Não permitir campo vazio.
     * @param type $name do input a validar
     */
    public function notEmpty($name){        
        $this->add(array(
            'name' => $name,
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array('isEmpty' => 'Não pode estar em branco'),
                    ),
                ),
            ),
        ));
    }
    
    /**
     * Verifica se um campo do form é igual ao outro
     * @param string $name
     * @param string $to
     * @param string $msg opcional padrão é para senhas
     */
    public function identical($name,$to,$msg='A senha não confere') {           
        $this->add(array(
            'name' => $name,
            'validators' => array(
                array(
                    'name' => 'Identical',
                    'options' => array(
                        'token' => $to,
//                        'messages' => array('isEmpty' => $msg),
                        'message' => $msg,
                    ),
                ),
            )
        ));
    }
    
    /**
     * Valida o formato do email
     * @param type $name
     * @param type $messageString opcional padrão é para email
     */
    public function email($name, $messageString='Digite um email valido') {           
        $validator = new \Zend\Validator\EmailAddress();
//        $validator->setOptions(array('domain'=>false));   
        $validator->setMessage($messageString);
        $this->add(array(
            'name' => $name,
            'validators' => array($validator)
        ));
    }
    
    /**
     * Forçar a não validar estes campos
     * Especie do bug no zf2 que força a validação dos campos selects
     * @param string $name
     */
    public function emptyTrue($name){
        $this->add(array(
            'name' => $name,
            'required' => false,
        ));
    }
}
