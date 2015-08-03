<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Risco
 *
 */
class Risco extends \Application\Form\AbstractForm {

    public function __construct($name = 'Risco', $options = array()) {
        if (is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager) {
            $this->em = $name;
        }
        parent::__construct('Risco', $options);

        $this->moduloName = "Tcmed";

        //$this->setInputFilter(new Filter\RiscoFilter);

        $this->setInputHidden('idRisco');
        $this->setSimpleText('descricao');
        $this->setSimpleText('dtInclusao');
        $this->setSimpleText('status');

        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
    }

}
