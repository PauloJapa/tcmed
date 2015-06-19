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
class Parametros extends AbstractForm{
    
    
    public function __construct($name = 'user', $options = array()) {
        parent::__construct($name, $options);
        
        $this->setInputFilter(new Filter\parametrosFilter);
        
        $this->setInputHidden('idParame');
        
        $this->setInputText2('chave', 'Chave : ',['placeholder'=>'Digite chave']);
        
        $this->setInputText2('conteudo', 'Conteudo : ',['placeholder'=>'Digite conteudo']);
        
        $this->setInputText2('descricao', 'Descricao : ',['placeholder'=>'Digite descriçao']);
        
        $selectOptions = ["A" => "Ativo","C" => "Cancelado"];
        $this->setInputSelect('status', 'Status: ', $selectOptions);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar: ');
        
    }
}
