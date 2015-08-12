<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of FuncaoEpcs
 * @author Allan Davini
 */
class FuncaoEpc extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'FuncaoEpc', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('FuncaoEpc', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\FuncaoEpcFilter);
        
        $this->setInputHidden('idFuncaoEpc');
        
        $this->setSimpleText('eficaz');
        
        $selectEpc = $this->getAllEpc();
        $this->setInputSelect('idEpc', 'Epc: ', $selectEpc);
        
        $selectFuncao = $this->getAllFuncao();
        $this->setInputSelect('idFuncao', 'Funcao: ', $selectFuncao);
        
        $selectRisco = $this->getAllRisco();
        $this->setInputSelect('idRisco', 'Risco: ', $selectRisco);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllEpc() {
        /* @var $repository \Application\Entity\Repository\EpcRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Epc");
        return $repository->fetchPairs('getEpc');
    }
    public function getAllFuncao() {
        /* @var $repository \Application\Entity\Repository\FuncaoRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Funcao");
        return $repository->fetchPairs('getFuncao');
    }
    public function getAllRisco() {
        /* @var $repository \Application\Entity\Repository\RiscoRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Risco");
        return $repository->fetchPairs('getNomeRisco');
    }
    
}
