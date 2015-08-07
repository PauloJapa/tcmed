<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Contato Service
 * @author Allan Davini
 */
class Contato extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Contato";        
        $this->id = 'idContato';
        
        $this->setDataRefArray([
            'endereco' => $this->basePath . 'Endereco'
        ]);
        
    }        
    
}
