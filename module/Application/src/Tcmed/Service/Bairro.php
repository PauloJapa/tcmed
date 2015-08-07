<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Bairro Service
 * @author Allan Davini
 */
class Bairro extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Bairro";        
        $this->id = 'idBairro';
        
        $this->setDataRefArray([
            'cidadeBairro' => $this->basePath . 'Cidade'
        ]);
        
    }        
    
}
