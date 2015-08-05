<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Clinica Service
 *
 */
class Clinica extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Clinica";        
        $this->id = 'idClinica';
        
        $this->setDataRefArray([
            'contato' => $this->basePath . 'Contato',
            'endereco' => $this->basePath . 'Endereco'
        ]);
        
    }        
    
}
