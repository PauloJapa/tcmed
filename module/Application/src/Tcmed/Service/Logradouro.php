<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Logradouro Service
 *
 */
class Logradouro extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Logradouro";        
        $this->id = 'idLogradouro';
        
        $this->setDataRefArray([
            'bairroBairro' => $this->basePath . 'Bairro',
            'tipologradouroTipologradouro' => $this->basePath . 'TipoLogradouro'
        ]);
        
        
        
    }        
    
}
