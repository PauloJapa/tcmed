<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of EpiFuncao Service
 * @author Allan Davini
 */
class EpiFuncao extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "EpiFuncao";        
        $this->id = 'idEpiFuncao';
        
        $this->setDataRefArray([
            'idEpi' => $this->basePath . 'Epi'
        ]);
        $this->setDataRefArray([
            'idFuncao' => $this->basePath . 'Funcao'
        ]);
        $this->setDataRefArray([
            'idRisco' => $this->basePath . 'Risco'
        ]);
        
    }        
    
}
