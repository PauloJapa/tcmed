<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Setor Service
 *
 */
class Bairro extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Setor";        
        $this->id = 'idSetor';
        
        $this->setDataRefArray([
            'cidadeBairro' => $this->basePath . 'Cidade'
        ]);
        
    }        
    
}
