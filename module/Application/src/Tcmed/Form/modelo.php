<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of modelo
 *
 */
class modelo extends \Application\Form\AbstractForm{
    
    public function __construct($name = 'modelo', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('modelo', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\AdministradoraFilter);
        
        $this->setInputHidden('idmodelo');
        
        $this->setSimpleText('razaoSocial');
 
        $selectOptionsEnderecos = $this->getAllEnderecos();
        $this->setInputSelect('endereco', 'ID do Endereço: ', $selectOptionsEnderecos);
        
        $selectOptionsHold = $this->getAllHold();
        $this->setInputSelect('hold', 'ID da Hold: ', $selectOptionsHold);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    public function getAllContatos() {
        /* @var $repository \Tcmed\Entity\Repository\ContatoRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Contato");
        return $repository->fetchPairs('getIdContato');
    }
    
}
