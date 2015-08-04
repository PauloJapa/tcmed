<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Setor
 *
 */
class Setor extends \Application\Form\AbstractForm {

    public function __construct($name = 'Setor', $options = array()) {
        if (is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager) {
            $this->em = $name;
        }
        parent::__construct('Setor', $options);

        $this->moduloName = "Tcmed";

        $this->setInputFilter(new Filter\SetorFilter);

        $this->setInputHidden('idSetor');
        $this->setSimpleText('nomeSetor');
        $this->setSimpleText('status');

        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
    }

}
