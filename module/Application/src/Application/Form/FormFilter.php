<?php

/*
 * License
 */

namespace Application\Form;

/**
 * Description of Grupo
 *
 * @author Paulo Watakabe <email>watakabe05@gmail.com</email>
 */
class FormFilter extends AbstractForm{
    
    
    public function __construct($name = 'FormFilter', $options = array()) {
        parent::__construct($name, $options);
        
        $this->setInputHidden('limitePag');
        
        $this->setInputText2('limitePageDesc');
    }
}
