<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of TipoMeioContato
 * @author Danilo Dorotheu
 */
class TipoMeioContato extends \Application\Form\AbstractForm{
    
    public function __construct($name = 'TipoMeioContato', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('TipoMeioContato', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\TipoMeioContatoFilter);
        
        $this->setInputHidden('idTipoMeioContato');
        
        $this->setSimpleText('descricao');
        $this->setSimpleText('mascara');
        $this->setSimpleText('erValidacao');
        $this->setSimpleText('status');

        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
}
