<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Consulta
 * @author Allan Davini
 */
class Consulta extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'Consulta', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Consulta', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\ConsultaFilter);
        
        $this->setInputHidden('idBairro');
        
        $this->setSimpleText('idFuncionario');
        
        $this->setSimpleText('status');
        
        $selectQuestionario = $this->getAllQuestionario();
        $this->setInputSelect('Questionario', 'Questionario: ', $selectQuestionario);
        
        $selectCargo = $this->getAllCargo();
        $this->setInputSelect('cargoCargo', 'Cargo: ', $selectCargo);
        
        $selectClinica = $this->getAllClinica();
        $this->setInputSelect('clinicaClinica', 'Clinica: ', $selectClinica);
        
        $selectMedico = $this->getAllMedico();
        $this->setInputSelect('medicoMedico', 'Medico: ', $selectMedico);
        
        $selectSetor = $this->getAllSetor();
        $this->setInputSelect('setorSetor', 'Setor: ', $selectSetor);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllQuestionario() {
        /* @var $repository \Application\Entity\Repository\QuestionarioRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Questionario");
        return $repository->fetchPairs('getIdQuestionario');
    }
    public function getAllCargo() {
        /* @var $repository \Application\Entity\Repository\CargoRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Cargo");
        return $repository->fetchPairs('getNomeCargo');
    }
    public function getAllClinica() {
        /* @var $repository \Application\Entity\Repository\ClinicaRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Clinica");
        return $repository->fetchPairs('getRazaoSocial');
    }
    public function getAllMedico() {
        /* @var $repository \Application\Entity\Repository\MedicoRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Medico");
        return $repository->fetchPairs('getNomeMedico');
    }
    public function getAllSetor() {
        /* @var $repository \Application\Entity\Repository\SetorRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Setor");
        return $repository->fetchPairs('getNomeSetor');
    }
    
}
