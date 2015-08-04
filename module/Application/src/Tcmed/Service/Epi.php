<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Epi Service
 *
 */
class Epi extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Epi";        
        $this->id = 'idEpi';
        
    }        
    
}
