<?php

/*
 * To change this license 
 */

namespace Tcmed\Form;

/**
 * Description of Resposta
 * @author Allan Davini
 */
class Resposta extends \Application\Form\AbstractForm{
    
    
    public function __construct($name = 'Resposta', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Resposta', $options);
        
        $this->moduloName = "Tcmed";  
        
        $this->setInputFilter(new Filter\RespostaFilter);
        
        $this->setInputHidden('idResposta');
        
        $this->setSimpleText('Resposta');
        
        $this->setSimpleText('respostaCheck');
        
        $selectCidade = $this->getAllCidade();
        $this->setInputSelect('cidadeBairro', 'Cidade: ', $selectCidade);
        
        $selectPergunta = $this->getAllPergunta();
        $this->setInputSelect('Pergunta', 'Pergunta: ', $selectPergunta);
        
        $selectConsulta = $this->getAllConsulta();
        $this->setInputSelect('consultaConsulta', 'Consulta: ', $selectConsulta);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar');
        
    }
    
    public function getAllCidade() {
        /* @var $repository \Application\Entity\Repository\CidadeRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Cidade");
        return $repository->fetchPairs('getNomeCidade');
    }
    public function getAllPergunta() {
        /* @var $repository \Application\Entity\Repository\PerguntaRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Pergunta");
        return $repository->fetchPairs('getPergunta');
    }
    public function getAllConsulta() {
        /* @var $repository \Application\Entity\Repository\ConsultaRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Consulta");
        return $repository->fetchPairs('getIdConsulta');
    }
    
}
