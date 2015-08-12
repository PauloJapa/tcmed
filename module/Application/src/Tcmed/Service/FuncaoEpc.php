<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of FuncaoEpc Service
 * @author Allan Davini
 */
class FuncaoEpc extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "FuncaoEpc";        
        $this->id = 'idFuncaoEpc';
        
        $this->setDataRefArray([
            'idEpc' => $this->basePath . 'Epc'
        ]);
        $this->setDataRefArray([
            'idFuncao' => $this->basePath . 'Funcao'
        ]);
        $this->setDataRefArray([
            'idRisco' => $this->basePath . 'Risco'
        ]);
        
    }        
    
}
