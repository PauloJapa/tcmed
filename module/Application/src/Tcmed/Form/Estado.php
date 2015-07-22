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
        
        $this->setInputFilter(new Filter\EstadoFilter);
        
        $this->setSimpleText('idEstado');
        
        $this->setSimpleText('nomeEstado');
        
        $this->setSimpleText('uf');
        
        $this->setSimpleText('status');
        
        $selectOptionsParent = $this->getAllParents();
        $this->setInputSelect('Pais', 'Pais: ', $selectOptionsParent);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllParents() {
        /* @var $repository \Application\Entity\Repository\AppMenuRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Repository\PaisRepository");
        return $repository->fetchParent();
    }
    
}
