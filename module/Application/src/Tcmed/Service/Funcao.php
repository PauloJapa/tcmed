<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Funcao Service
 * @author Allan Davini
 */
class Funcao extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Funcao";        
        $this->id = 'idFuncao';
        
        $this->setDataRefArray([
            'descricaoDescricao' => $this->basePath . 'Descricao'
        ]);
        
    }        
    
}
