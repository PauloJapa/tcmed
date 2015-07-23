<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Estado Service
 *
 */
class Estado extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Estado";        
        $this->id = 'idEstado';
        
        $this->setDataRefArray([
            'pais' => $this->basePath . 'Pais'
        ]);
        
    }        
    
}
