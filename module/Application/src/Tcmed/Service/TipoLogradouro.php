<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of TipoLogradouro Service
 * @author Allan Davini
 */
class TipoLogradouro extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "TipoLogradouro";        
        $this->id = 'idTipologradouro';
        
        
        
    }        
    
}
