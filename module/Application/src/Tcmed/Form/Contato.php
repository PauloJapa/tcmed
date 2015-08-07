<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Contato
 * @author Allan Davini
 */
class Contato extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'Contato', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Contato', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\ContatoFilter);
        
        $this->setInputHidden('idContato');
        
        $this->setSimpleText('nomeContato');
        
        $this->setSimpleText('status');
        
        $this->setSimpleText('rg');
        
        $this->setSimpleText('cpf');
        
        $selectOptionsParent = $this->getAllPairs();
        $this->setInputSelect('endereco', 'Endereco: ', $selectOptionsParent);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllPairs() {
        /* @var $repository \Application\Entity\Repository\AppMenuRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Endereco");
        return $repository->fetchPairs('getNumero');
    }
    
}
