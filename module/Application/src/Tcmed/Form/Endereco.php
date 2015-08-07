<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Endereco
 * @author Allan Davini
 */
class Endereco extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'Endereco', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Endereco', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\EnderecoFilter);
        
        $this->setInputHidden('idEndereco');
        
        $this->setSimpleText('numero');
        
        $this->setSimpleText('complemento');
        
        $this->setSimpleText('status');
        
        $selectOptionsParent = $this->getAllPairs();
        $this->setInputSelect('logradouro', 'Logradouro: ', $selectOptionsParent);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllPairs() {
        /* @var $repository \Application\Entity\Repository\AppMenuRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Logradouro");
        return $repository->fetchPairs('getNomeLogradouro');
    }
    
}
