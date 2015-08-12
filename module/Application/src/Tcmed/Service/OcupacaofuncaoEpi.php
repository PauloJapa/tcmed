<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of OcupacaofuncaoEpi Service
 * @author Allan Davini
 */
class OcupacaofuncaoEpi extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "OcupacaofuncaoEpi";        
        $this->id = 'idOcupacaofuncaoEpi';
        
        $this->setDataRefArray([
            'idOcupacaofuncao' => $this->basePath . 'OcupacaoFuncao'
        ]);
        $this->setDataRefArray([
            'idEpi' => $this->basePath . 'Epi'
        ]);
        
    }        
    
}
