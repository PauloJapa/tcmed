<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Administradora
 *
 */
class Administradora extends \Application\Form\AbstractForm{
    
    public function __construct($name = 'Administradora', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Administradora', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\AdministradoraFilter);
        
        $this->setInputHidden('idAdministradora');
        
        $this->setSimpleText('razaoSocial');
 
        $this->setSimpleText('fantasiaAdministradora');
        
        $this->setSimpleText('cnpj');
        
        $this->setSimpleText('updatedAt');
        
        $this->setSimpleText('status');
        
        $this->setSimpleText('contato');
        
        $this->setSimpleText('endereco');

        $this->setSimpleText('referenciaTcmed');
        
        $this->setSimpleText('hold');
        
        $this->setSimpleText('holdVirtual');
        
        $selectOptionsContatos = $this->getAllContatos();
        $this->setInputSelect('contato', 'ID do Contato: ', $selectOptionsContatos);
        
        $selectOptionsEnderecos = $this->getAllEnderecos();
        $this->setInputSelect('endereco', 'ID do Endereço: ', $selectOptionsEnderecos);
        
        $selectOptionsHold = $this->getAllHold();
        $this->setInputSelect('hold', 'ID da Hold: ', $selectOptionsHold);
        $this->setInputSelect('holdVirtual', 'ID da HoldVirtual: ', $selectOptionsHold);
        
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
    
    public function getAllHold() {
        /* @var $repository \Tcmed\Entity\Repository\HoldRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Hold");
        return $repository->fetchPairs('getNomeHold');
    }
    
}
