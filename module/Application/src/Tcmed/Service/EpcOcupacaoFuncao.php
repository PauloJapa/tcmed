<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of EpcOcupacaofuncao Service
 * @author Allan Davini
 */
class EpcOcupacaofuncao extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "EpcOcupacaofuncao";        
        $this->id = 'idEpcOcupacaofuncao';
        
        $this->setDataRefArray([
            'idOcupacaofuncao' => $this->basePath . 'OcupacaoFuncao'
        ]);
        $this->setDataRefArray([
            'idEpc' => $this->basePath . 'Epc'
        ]);
        
    }        
    
}
