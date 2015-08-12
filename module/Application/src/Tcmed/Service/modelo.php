<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of modelo Service
 *
 */
class modelo extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "modelo";        
        $this->id = 'idmodelo';
        
        $this->setDataRefArray([
            'cidadeBairro' => $this->basePath . 'Cidade'
        ]);
        
    }        
    
}
