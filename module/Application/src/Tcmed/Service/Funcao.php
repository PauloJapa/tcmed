<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Cidade Service
 *
 */
class Cidade extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Cidade";        
        $this->id = 'idCidade';
        
        $this->setDataRefArray([
            'estadoEstado' => $this->basePath . 'Estado'
        ]);
        
    }        
    
}
