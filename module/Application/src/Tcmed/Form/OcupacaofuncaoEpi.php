<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of OcupacaofuncaoEpi
 * @author Allan Davini
 */
class OcupacaofuncaoEpi extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'OcupacaofuncaoEpi', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('OcupacaofuncaoEpi', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\OcupacaofuncaoEpiFilter);
        
        $this->setInputHidden('idOcupacaofuncaoEpi');
        
        $this->setSimpleText('eficaz');
        
        $selectOcupacaofuncao = $this->getAllOcupacaofuncao();
        $this->setInputSelect('idcupacaofuncao', 'OcupacaoFuncao: ', $selectOcupacaofuncao);
        
        $selectEpi = $this->getAllEpi();
        $this->setInputSelect('idEpi', 'Epi: ', $selectEpi);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllOcupacaofuncao() {
        /* @var $repository \Application\Entity\Repository\OcupacaofuncaoRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\OcupacaoFuncao");
        return $repository->fetchPairs('getIdOcupacaofuncao');
    }
    public function getAllEpi() {
        /* @var $repository \Application\Entity\Repository\EpiRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Epi");
        return $repository->fetchPairs('getEpi');
    }
    
}
