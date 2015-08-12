<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Epi
 * @author Allan Davini
 */
class Epi extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'Epi', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Epi', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\EpiFilter);
        
        $this->setInputHidden('idEpi');
        
        $this->setSimpleText('epi');
        
        $this->setSimpleText('status');
        
        $selectOptionsParent = $this->getAllPairs();
        $this->setInputSelect('idModeloseguranca', 'ModeloSeguranca: ', $selectOptionsParent);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllPairs() {
        /* @var $repository \Application\Entity\Repository\ModeloSegurancaRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\ModeloSeguranca");
        return $repository->fetchPairs('getNomeModeloSeguranca');
    }
    
}
