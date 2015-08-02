<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Estado
 *
 */
class Estado extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'Estado', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Estado', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\EstadoFilter);
        
        $this->setInputHidden('idEstado');
        
        $this->setSimpleText('nomeEstado');
        
        $this->setSimpleText('uf');
        
        $this->setSimpleText('status');
        
        $selectOptionsParent = $this->getAllPairs();
        $this->setInputSelect('pais', 'Pais: ', $selectOptionsParent);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllPairs() {
        /* @var $repository \Application\Entity\Repository\AppMenuRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Pais");
        return $repository->fetchPairs('getNomePais');
    }
    
}
