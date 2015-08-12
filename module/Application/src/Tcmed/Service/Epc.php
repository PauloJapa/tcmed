<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Epc Service
 * @author Allan Davini
 */
class Epc extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Epc";        
        $this->id = 'idEpc';
        
        $this->setDataRefArray([
            'idModeloseguranca' => $this->basePath . 'ModeloSeguranca'
        ]);
        
    }        
    
}
