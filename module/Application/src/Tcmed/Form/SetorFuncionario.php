<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of SetorFuncionario
 *
 */
class SetorFuncionario extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'SetorFuncionario', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('SetorFuncionario', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\SetorFuncionarioFilter);
        
        $this->setInputHidden('funcionarioIdFuncionario');
        
        $this->setSimpleText('setorSetor');
        
        $selectIdFuncionario = $this->getAllIdFuncionario();
        $this->setInputSelect('funcionarioIdFuncionario', 'Id Funcionario: ', $selectIdFuncionario);
        $selectSetor = $this->getAllSetor();
        $this->setInputSelect('setorSetor', 'Setor: ', $selectSetor);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllIdFuncionario() {
        /* @var $repository \Tcmed\Entity\Repository\FuncionarioRepository */
        return [];
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Funcionario");
        return $repository->fetchPairs('getNomeFuncionario');
    }
    public function getAllSetor() {
        /* @var $repository \Application\Entity\Repository\SetorRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Setor");
        return $repository->fetchPairs('getNomeSetor');
    }
    
}
