<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Hold Service
 *
 */
class Hold extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Hold";        
        $this->id = 'idHold';
        
        $this->setDataRefArray([
            'contatoContato' => $this->basePath . 'Contato',
            'endereco' => $this->basePath . 'Endereco'
        ]);
        
    }        
    
}
