<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Application\Mail\Mail;
/**
 * Description of User
 *
 * @author Paulo Watakabe
 */
class Usuario extends AbstractService{

    protected $transport;
    protected $view;

    public function __construct(EntityManager $em, SmtpTransport $transport, $view) {
        parent::__construct($em);
        
        $this->entity = $this->basePath . "Usuario";        
        $this->id = 'idUsuario';
        
        $this->setDataRefArray([
            'role' => $this->basePath . 'AppRole'
        ]);
        
        $this->transport= $transport;
        $this->view = $view;
    }
    
    public function insert(array $data) {
        /** @var $entity Application/Entity/Usuario */
        $entity = parent::insert($data);
        $dataEmail = array('nome'=>$entity->getNome(), 'activationKey'=> $entity->getActivationKey());
        
        if($entity){
            $mail = new Mail($this->transport, $this->view, 'add-user');
            $mail->setSubject('Confirmação de cadastro')
                    ->setTo($entity->getEmail())
                    ->setData($dataEmail)
                    ->prepare()
                    ->send();
            
            return $entity;
        }
    }
    
    public function activate($key)
    {
        $repo = $this->em->getRepository($this->entity);
        
        $user = $repo->findOneByActivationKey($key);
        
        if($user && !$user->getActive())
        {
            $user->setActive(true);
            
            $this->em->persist($user);
            $this->em->flush();
            
            return $user;
        }
    }
    
    public function update(array $data) {
        if(!empty($data)){
            $this->data = $data;
        }
        $entity = $this->em->getReference($this->entity, $this->data[$this->id]);
         
        if (empty($data['senhaUsuario'])) {
            unset($data['senhaUsuario']);
        }

        $this->setReferences();
        
        (new Hydrator\ClassMethods())->hydrate($this->data, $entity);
        
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
}
