<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Grupo
 *
 * @author Paulo Watakabe
 */
class Grupo extends AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        
        $this->entity = $this->basePath . "Grupo";        
        $this->id = 'idGrupo';
    }
        
    
}
