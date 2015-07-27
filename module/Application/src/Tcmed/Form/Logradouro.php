<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Logradouro
 *
 */
class Logradouro extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'Logradouro', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Logradouro', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\LogradouroFilter);
        
        $this->setInputHidden('idLogradouro');
        
        $this->setSimpleText('nomeLogradouro');
        
        $this->setSimpleText('status');
        
        $this->setSimpleText('cep');
        
        $selectOptionsParent = $this->getAllPairs();
        $this->setInputSelect('bairroBairro', 'Bairro: ', $selectOptionsParent);
        
        $selectOptionsParent1 = $this->getAllPairsOfLogradouro();
        $this->setInputSelect('tipologradouroTipologradouro', 'Tipo de logradouro: ', $selectOptionsParent1);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllPairs() {
        /* @var $repository \Application\Entity\Repository\AppMenuRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Bairro");
        return $repository->fetchPairs('getNomeBairro');
        
        
    }
    
    public function getAllPairsOfLogradouro() {
        /* @var $repository \Application\Entity\Repository\AppMenuRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\TipoLogradouro");
        return $repository->fetchPairs('getTipo');
    }
}
