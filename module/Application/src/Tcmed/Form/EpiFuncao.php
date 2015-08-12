<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of EpiFuncao
 * @author Allan Davini
 */
class EpiFuncao extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'EpiFuncao', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('EpiFuncao', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\EpiFuncaoFilter);
        
        $this->setInputHidden('idEpiFuncao');
        
        $this->setSimpleText('eficaz');
        
        $selectEpi = $this->getAllEpis();
        $this->setInputSelect('idEpi', 'Epi: ', $selectEpi);
        
        $selectFuncao = $this->getAllFuncao();
        $this->setInputSelect('idFuncao', 'Funcao: ', $selectFuncao);
        
        $selectRisco = $this->getAllRisco();
        $this->setInputSelect('idRisco', 'Risco: ', $selectRisco);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllEpis() {
        /* @var $repository \Application\Entity\Repository\EpiRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Epi");
        return $repository->fetchPairs('getEpi');
    }
    public function getAllFuncao() {
        /* @var $repository \Application\Entity\Repository\FuncaoRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Funcao");
        return $repository->fetchPairs('getNomeFuncao');
    }
    public function getAllRisco() {
        /* @var $repository \Application\Entity\Repository\RiscoRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Risco");
        return $repository->fetchPairs('getNomeRisco');
    }
    
}
