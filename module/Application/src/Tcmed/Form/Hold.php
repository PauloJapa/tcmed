<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Hold
 *
 */
class Hold extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'Hold', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Hold', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\HoldFilter);
        
        $this->setInputHidden('idHold');
        
        $this->setSimpleText('nomeHold');
        
        $this->setSimpleText('fantasiaHold');
        
        $this->setSimpleText('cnpj');
        
        $this->setSimpleText('status');
        
        $this->setSimpleText('referenciaHold');
        
        $this->setSimpleText('referenciaTcmed');
        
        $this->setSimpleText('referenciaAdm');
        
        $this->setSimpleText('contatoContato');
        
        $this->setSimpleText('endereco');
        
        
        $selectOptionsContatos = $this->getAllContatos();
        $this->setInputSelect('contatoContato', 'ID do Contato: ', $selectOptionsContatos);
        
        $selectOptionsEnderecos = $this->getAllEnderecos();
        $this->setInputSelect('endereco', 'ID do Endereço: ', $selectOptionsEnderecos);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllContatos() {
        /* @var $repository \Tcmed\Entity\Repository\ContatoRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Contato");
        return $repository->fetchPairs('getIdContato');
    }
    
    public function getAllEnderecos() {
        /* @var $repository \Tcmed\Entity\Repository\EnderecoRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Endereco");
        return $repository->fetchPairs('getIdEndereco');
    }
    
}
