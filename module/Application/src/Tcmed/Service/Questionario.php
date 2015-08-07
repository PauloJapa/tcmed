<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Questionario Service
 * @author Allan Davini
 */
class Questionario extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Questionario";        
        $this->id = 'idQuestionario';
        
        $this->setDataRefArray([
            'clinica' => $this->basePath . 'Clinica'
        ]);
        
    }        
    
}
