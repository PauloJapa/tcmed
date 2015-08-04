<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Pergunta
 *
 */
class Pergunta extends \Application\Form\AbstractForm {

    public function __construct($name = 'Pergunta', $options = array()) {
        if (is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager) {
            $this->em = $name;
        }
        parent::__construct('Pergunta', $options);

        $this->moduloName = "Tcmed";

        $this->setInputFilter(new Filter\PerguntaFilter);

        $this->setInputHidden('idPergunta');
        $this->setSimpleText('pergunta');
        $this->setSimpleText('resposta');
        $this->setSimpleText('checkResposta');
        $this->setSimpleText('status');

        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
    }

}
