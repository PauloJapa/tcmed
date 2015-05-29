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
class User extends AbstractService{

    protected $transport;
    protected $view;

    public function __construct(EntityManager $em, SmtpTransport $transport, $view) {
        parent::__construct($em);
        
        $this->entity = "Application\Entity\Usuario";
        $this->transport= $transport;
        $this->view = $view;
    }
    
    public function insert(array $data) {
        $entity = parent::insert($data);
        $dataEmail = array('nome'=>$data['nome'], 'activationKey'=> $entity->getActivationKey());
        
        if($entity){
            $mail = new Mail($this->transport, $this->view, 'add-user');
            $mail->setSubject('Confirmação de cadastro')
                    ->setTo($data['email'])
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
    
    public function update(array $data)
    {
        $entity = $this->em->getReference($this->entity, $data['id']);
        
        if(empty($data['senha_usuario']))
            unset($data['senha_usuario']);
        
        (new Hydrator\ClassMethods())->hydrate($data, $entity);
        
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
}
