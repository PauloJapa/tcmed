<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of EpcOcupacaofuncao
 * @author Allan Davini
 */
class EpcOcupacaofuncao extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'EpcOcupacaofuncao', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('EpcOcupacaofuncao', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\EpcOcupacaofuncaoFilter);
        
        $this->setInputHidden('idEpcOcupacaofuncao');
        
        $this->setSimpleText('eficaz');
        
        $selectOcupacaofuncao = $this->getAllOcupacaofuncao();
        $this->setInputSelect('idcupacaofuncao', 'OcupacaoFuncao: ', $selectOcupacaofuncao);
        
        $selectEpc = $this->getAllEpc();
        $this->setInputSelect('idEpc', 'Epc: ', $selectEpc);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllOcupacaofuncao() {
        /* @var $repository \Application\Entity\Repository\OcupacaofuncaoRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\OcupacaoFuncao");
        return $repository->fetchPairs('getIdOcupacaofuncao');
    }
    public function getAllEpc() {
        /* @var $repository \Application\Entity\Repository\EpcRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Epc");
        return $repository->fetchPairs('getEpc');
    }
    
}
