<?php

/*
 * To change this license 
 */

namespace Application\Form;

/**
 * Description of Enviado
 *
 * @author Paulo Watakabe <email>watakabe05@gmail.com</email>
 */
class Enviado extends AbstractForm{
    
    
    public function __construct($name = 'Enviado', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('Enviado', $options);
        
//        $this->setInputFilter(new Filter\EnviadoFilter);
        
        $this->setInputHidden('idEnviado');

        $this->setSimpleText('dateEnviado');
        
        $this->setSimpleText('dateRecebido');
        
        $selectOptionsUser = $this->getAllUsers();
        $this->setInputSelect('fromUser', 'Para o usuario: ', $selectOptionsUser,['placeholder'=>'Para o usuario']);
        
        $this->setInputSelect('toUser', 'Do usuario : ', $selectOptionsUser,['placeholder'=>'de quem']);
        
        $selectOptionsMensagem = $this->getAllMensagem();
        $this->setInputSelect('mensagemMensagem', 'Mensagem: ', $selectOptionsMensagem,['placeholder'=>'Mensagem a ser enviada']);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar: ');
        
    }
    
    public function getAllUsers() {
        /* @var $repository \Application\Entity\Repository\UserRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\User");
        return $repository->fetchPairs();
    }
    
    public function getAllMensagem() {
        /* @var $repository \Application\Entity\Repository\MensagemRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\Mensagem");
        return $repository->fetchPairs();
    }
}
