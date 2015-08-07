<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Endereco Service
 * @author Allan Davini
 */
class Endereco extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Endereco";        
        $this->id = 'idEndereco';
        
        $this->setDataRefArray([
            'logradouro' => $this->basePath . 'Logradouro'
        ]);
        
    }        
    
}
