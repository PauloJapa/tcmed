<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Enviado
 *
 * @author Paulo Watakabe
 */
class Enviado extends AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        
        $this->entity = $this->basePath . "Enviado";        
        $this->id = 'idEnviado';
        
        $this->setDataRefArray([
            'toUser' => $this->basePath . 'User',
            'fromUser' => $this->basePath . 'User',
            'mensagemMensagem' => $this->basePath . 'Mensagem',
        ]);
    }        
    
}
