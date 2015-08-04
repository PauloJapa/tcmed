<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Funcao
 *
 */
class Funcao extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'Funcao', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Funcao', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\FuncaoFilter);
        
        $this->setInputHidden('idFuncao');
        
        $this->setSimpleText('nomeFuncao');
        
        $this->setSimpleText('status');
        
        $this->setSimpleText('referencia');
        
        $this->setSimpleText('codFuncao');
        
        $selectOptionsParent = $this->getAllPairs();
        $this->setInputSelect('descricaoDescricao', 'Descricao: ', $selectOptionsParent);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllPairs() {
        /* @var $repository \Application\Entity\Repository\AppMenuRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Descricao");
        return $repository->fetchPairs('getDescricao');
    }
    
}
