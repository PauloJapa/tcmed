<?php

/*
 * To change this license 
 */

namespace Application\Service;

use Doctrine\ORM\EntityManager;

/**
 * Description of Messenger
 *
 * @author Paulo Watakabe
 */
class Messenger extends AbstractService {

    public function __construct(EntityManager $em) {
        parent::__construct($em);
    }

    /**
     * Registra a Mensagem a ser enviada e 
     * registra na tabela enviados para quem deve receber
     * @param Array $data
     */
    public function sendMensagem($data) {
        /* @var $user \Application\Entity\User */
        $userRepository = $this->em->getRepository($this->basePath . "User");
        $user = $userRepository->findOneByIdUser(str_replace('us', '', $data['userby']));
        
        if(0 === strpos($data['userto'], 'us')){
            $userTo = $userRepository->findOneByIdUser(str_replace('us', '', $data['userto']));
        }else{
            /* @var $grupoTo \Application\Entity\Grupo */
            $grupoRepository = $this->em->getRepository($this->basePath . "Grupo");
            $grupoTo = $grupoRepository->findOneByIdGrupo(str_replace('gr', '', $data['userto']));
            $userTo = FALSE;
if(!$grupoTo){  echo 'erro 3 ';          return;        }        
        }
        
        $serviceMensagem = new Mensagem($this->em);
        $entityMensagem = $serviceMensagem->insert(['texto' => $data['msg']]);
        
        $serviceEnviado = new Enviado($this->em);
        $dataEnvio['mensagemMensagem'] = $entityMensagem;
        $dataEnvio['fromUser'] = $user;
        $dataEnvio['dateEnviado'] = new \DateTime("now");
        
        if(!$userTo){
            $dataEnvio['toGrupo'] = $grupoTo;
            $ContatoRepository = $this->em->getRepository($this->basePath . "Contato");
            $contatosGrupo = $ContatoRepository->findByGrupoGrupo($grupoTo->getId());
            /* @var $contatoGrupo \Application\Entity\Contato */
            foreach ($contatosGrupo as $contatoGrupo) {
                if($contatoGrupo->getContatoUser()->getId() == $user->getId()){
                    continue;
                }
                $dataEnvio['toUser'] = $contatoGrupo->getContatoUser();
                $serviceEnviado->insert($dataEnvio);
            }
            
        }else{
            $dataEnvio['toUser'] = $userTo;
            $serviceEnviado->insert($dataEnvio);             
        }        
    }

    public function whoIam($meUser) {
        $userRepository = $this->em->getRepository($this->basePath . "User");
        
        $user = $userRepository->findBy([
            'usuarioId' => $meUser['idUsuario']
        ]);
        
        return $user[0];
    }
    
    public function getHistory($dataPost) {        
        /* @var $repositoryEnviado \Application\Entity\Repository\EnviadoRepository */
        $repositoryEnviado = $this->em->getRepository($this->basePath . "Enviado");
         
        $parameters['dateEnviado'] = new \DateTime('now');
        switch ($dataPost['period']) {
            case 'week':
                $parameters['dateEnviado']->sub(new \DateInterval('P7D'));
                break;
            case 'month':
                $parameters['dateEnviado']->sub(new \DateInterval('P1M'));
                break;
            default:
                $parameters['dateEnviado']->sub(new \DateInterval('PT10H'));
//                $parameters['dateEnviado']->sub(new \DateInterval('P1D'));
        }
        
        $where = "e.dateEnviado > :dateEnviado"; 
        $parameters['userId'] = str_replace('us', '', $dataPost['userId']);
        if(0 === strpos($dataPost['from'], 'us')){    
            $where .= ' AND ((e.fromUser = :from AND e.toUser = :userId AND e.toGrupo IS NULL)'; //Enviadas para mim
            $where .= ' OR  (e.fromUser = :userId AND e.toUser = :from AND e.toGrupo IS NULL))'; //Enviadas por mim
            $parameters['from'] = str_replace('us', '', $dataPost['from']);
        }else{
            $where .= ' AND ((e.toUser = :userId AND e.toGrupo = :from)';
            $where .= ' OR  (e.fromUser = :userId AND e.toGrupo = :from AND e.toUser = :userTo ))';
            $parameters['from'] = str_replace('gr', '', $dataPost['from']);
            $parameters['userTo'] = str_replace('us', '', $dataPost['userTo']);
        } 
        
        return $repositoryEnviado->getEnviadoDql($where, $parameters); 
    }
    
    public function getUpgradedStatusUser($dataPost) {
        /* @var $repositoryContato \Application\Entity\Repository\ContatoRepository */
        $repositoryContato = $this->em->getRepository($this->basePath . "Contato");
        
        $where = 'c.userUser = :userUser and co.statusDatetime > :statusDatetime';
        $parameters['userUser'] = $dataPost['userId'];
        $parameters['statusDatetime'] = new \DateTime('now');
        $parameters['statusDatetime']->sub(new \DateInterval('PT2M'));
        
        return $repositoryContato->getUpgradedStatusUser($where, $parameters);         
    }
    
    public function getChangeStatusUser($dataPost) {
        $serviceUser = new User($this->em);
        $data['idUser'] = $dataPost['userId'];
        $data['statusChat'] = $dataPost['status'];
        $data['statusDatetime'] = new \DateTime('now');
        $entityUser = $serviceUser->update($data);
        if($entityUser){
            return TRUE;
        }
        return FALSE;
    }
    
    public function ChangeStatusMsgUser($dataPost) {
        $serviceUser = new User($this->em);
        $data['idUser'] = $dataPost['userId'];
        $data['statusMsg'] = $dataPost['statusMsg'];
        $data['statusDatetime'] = new \DateTime('now');
        $entityUser = $serviceUser->update($data);
        if($entityUser){
            return TRUE;
        }
        return FALSE;        
    }

}
