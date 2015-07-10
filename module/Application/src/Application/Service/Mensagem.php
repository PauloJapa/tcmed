<?php

/*
 * To change this license 
 */

namespace Application\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Mensagem
 *
 * @author Paulo Watakabe
 */
class Mensagem extends AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        
        $this->entity = $this->basePath . "Mensagem";        
        $this->id = 'idMensagem';
    }        
    
}
