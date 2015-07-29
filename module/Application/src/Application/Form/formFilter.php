<?php

/*
 * License
 */

namespace Application\Form;

/**
 * Description of Grupo
 *
 * @author Danilo Dorotheu
 */
class FormFilter extends AbstractForm{
    
    
    public function __construct($name = 'FormFilter', $options = array()) {
        parent::__construct($name, $options);
        
        $this->setInputHidden('limitePag');
        
        $this->setInputText2('pesquisa', 'Pesquisar');
        
    }
}

