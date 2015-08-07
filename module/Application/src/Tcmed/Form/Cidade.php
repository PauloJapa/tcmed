<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Cidade
 * @author Allan Davini
 */
class Cidade extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'Cidade', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Cidade', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\CidadeFilter);
        
        $this->setInputHidden('idCidade');
        
        $this->setSimpleText('nomeCidade');
        
        $this->setSimpleText('status');
        
        $selectOptionsParent = $this->getAllPairs();
        $this->setInputSelect('estadoEstado', 'Estado: ', $selectOptionsParent);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllPairs() {
        /* @var $repository \Application\Entity\Repository\AppMenuRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Estado");
        return $repository->fetchPairs('getNomeEstado');
    }
    
}
