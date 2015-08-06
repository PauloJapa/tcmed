<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Questionario
 *
 */
class Questionario extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'Questionario', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Questionario', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\QuestionarioFilter);
        
        $this->setInputHidden('IdQuestionario');
        
        $this->setSimpleText('status');
        
        $this->setSimpleText('questionariocol');
        
        $this->setSimpleText('pergunta');
        
        $selectClinica = $this->getAllClinica();
        $this->setInputSelect('clinica', 'Clinica: ', $selectClinica);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllClinica() {
        /* @var $repository \Application\Entity\Repository\ClinicaRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Clinica");
        return $repository->fetchPairs('getNomeClinica');
    }
    
}
