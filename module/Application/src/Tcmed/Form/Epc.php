<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Epc
 * @author Allan Davini
 */
class Epc extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'Epc', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Epc', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\EpcFilter);
        
        $this->setInputHidden('idEpc');
        
        $this->setSimpleText('epc');
        
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
