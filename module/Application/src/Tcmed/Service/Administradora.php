<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Administradora Service
 *
 */
class Administradora extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Administradora";        
        $this->id = 'idAdministradora';
        
        $this->setDataRefArray([
            'contato' => $this->basePath . 'Contato',
            'endereco' => $this->basePath . 'Endereco',
            'hold' => $this->basePath . 'Hold',
            'holdVirtual' => $this->basePath . 'Hold'
        ]);
        
    }        
    
}
