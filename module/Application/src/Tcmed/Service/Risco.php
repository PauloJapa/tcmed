<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Risco Service
 * @author Allan Davini
 */
class Risco extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Risco";        
        $this->id = 'idRisco';
        
        $this->setDataRefArray([
            'idModeloseguranca' => $this->basePath . 'ModeloSeguranca'
        ]);
        
    }        
    
}
