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
        $user = $userRepository->findOneByIdUser(str_replace('us', $data['userby'], ''));
if(!$user){    echo 'erro 1 ';        return;        }        
        
        if(0 === strpos($data['userto'], 'us')){
            $userTo = $UserRepository->findOneByIdUser(str_replace('us', $data['userto'], ''));
if(!$userTo){  echo 'erro 2 ';          return;        }        
        }else{
            /* @var $grupoTo \Application\Entity\Grupo */
            $grupoRepository = $this->em->getRepository($this->basePath . "Grupo");
            $grupoTo = $grupoRepository->findOneByIdUser(str_replace('gr', $data['userto'], ''));
            $userTo = FALSE;
if(!$grupoTo){  echo 'erro 3 ';          return;        }        
        }
        
        $serviceMensagem = new Mensagem($this->em);
        $entityMensagem = $serviceMensagem->insert(['texto' => $data['msg']]);
        
        $serviceEnviado = new Enviado($this->em);
        $dataEnvio['mensagemMensagem'] = $entityMensagem;
        $dataEnvio['fromUser'] = $user;
        $dataEnvio['dateEnviado'] = new \DateTime("now");
        
        if(!$user){
            $contatosGrupo = $ContatoRepository->findByGrupoGrupo($contatoTo->getGrupoGrupo()->getIdGrupo());
            foreach ($contatosGrupo as $contatoGrupo) {
                if($contatoGrupo->getContatoUser()->getId() == $user->getId()){
                    continue;
                }
                $dataEnvio['toUser'] = $contatoGrupo->getContatoUser();
                $dataEnvio['toContato'] = $contatoGrupo;
                $serviceEnviado->insert($dataEnvio);
            }
            
        }else{
            $dataEnvio['toUser'] = $userTo;
            $serviceEnviado->insert($dataEnvio);             
        }
        
        /* @var $contatoGrupo \Application\Entity\Contato */
        if($contatoTo->getGrupoGrupo() instanceof \Application\Entity\Grupo){
        }else{           
        }
    }

    public function whoIam($meUser) {
        $userRepository = $this->em->getRepository($this->basePath . "User");
        
        $user = $userRepository->findBy([
            'usuarioId' => $meUser['idUsuario']
        ]);
        
        return $user[0];
    }

}
