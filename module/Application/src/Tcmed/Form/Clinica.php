<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Clinica
 *
 */
class Clinica extends \Application\Form\AbstractForm{
    
    public function __construct($name = 'Clinica', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Clinica', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\ClinicaFilter);
        
        $this->setInputHidden('idClinica');
        
        $this->setSimpleText('razaoSocial');
 
        $this->setSimpleText('fantasiaClinica');
        
        $this->setSimpleText('cnpj');
        
        $this->setSimpleText('updatedAt');
        
        $this->setSimpleText('status');
        
        $this->setSimpleText('contato');
        
        $this->setSimpleText('endereco');
        
        $selectOptionsContatos = $this->getAllContatos();
        $this->setInputSelect('contato', 'ID do Contato: ', $selectOptionsContatos);
        
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
