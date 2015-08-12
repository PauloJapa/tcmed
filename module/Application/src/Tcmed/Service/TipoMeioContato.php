<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of TipoMeioContato Service
 * @author Danilo Dorotheu
 */
class TipoMeioContato extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "TipoMeioContato";        
        $this->id = 'idTipoMeioContato';
    }        
    
}
