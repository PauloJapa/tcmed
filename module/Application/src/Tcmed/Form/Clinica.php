<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

use \Application\Form\AbstractForm;
/**
 * Description of Clinica
 *
 */
class Clinica extends AbstractForm{
    
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
        
        $contato = $this->getContato();
        $this->setInputSelect('contato', 'Contato: ', $contato);
        
        $endereco = $this->getEndereco();
        $this->setInputSelect('endereco', 'Endereco: ', $endereco);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getEndereco() {
        /* @var $repository \Tcmed\Entity\Repository\EnderecoRepository */
        $repository = $this->em->getRepository("Tcmed\Entity\Endereco");
        return $repository->fetchPairs('getLogradouro');
    }
    
    public function getContato() {
        /* @var $repository \Tcmed\Entity\Repository\ContatoRepository */
        $repository = $this->em->getRepository("Tcmed\Entity\Contato");
        return $repository->fetchPairs('getNomeContato');
    }
    
}
