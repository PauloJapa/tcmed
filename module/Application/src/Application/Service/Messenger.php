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
        $serviceMensagem = new Mensagem($this->em);
        $dataMensagem['texto'] = $data['msg'];

        $entityMensagem = $serviceMensagem->insert($dataMensagem);

        $repository = $this->em->getRepository($this->basePath . "User");
        $users = $repository->findAll();

        $serviceEnviado = new Enviado($this->em);
        $dataEnvio['mensagemMensagem'] = $entityMensagem;
        $dataEnvio['fromUser'] = $users[0];
        $dataEnvio['dateEnviado'] = new \DateTime("now");

        foreach ($users as $user) {
            $dataEnvio['toUser'] = $user;
            $serviceEnviado->insert($dataEnvio);
        }
    }

    /**
     * Registra a Mensagem a ser enviada e 
     * registra na tabela enviados para quem deve receber
     * @param Array $data
     */
    public function receiveMensagem($data) {
        $enviadoRepository = $this->em->getRepository($this->basePath . "Enviado");
        $enviado = $enviadoRepository->findAll();

        return $enviadoRepository->receive($data['userId']);
    }

    public function whoIam($meUser) {
        $userRepository = $this->em->getRepository($this->basePath . "User");
        
        $user = $userRepository->findBy([
            'idUser' => $meUser['idUsuario']
        ]);
        
        return $user[0];
    }

}
