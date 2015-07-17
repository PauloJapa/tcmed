<?php

/*
 * To change this license 
 */

namespace Application\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Shell
 *
 * @author Paulo Watakabe
 */
class Shell extends AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        
//        $this->entity = $this->basePath . "Shell";        
//        $this->id = 'idShell';
        
    }        
    
}
