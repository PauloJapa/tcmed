<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Resposta Service
 *
 */
class Resposta extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Resposta";        
        $this->id = 'idResposta';
        
        $this->setDataRefArray([
            'pergunta' => $this->basePath . 'Pergunta',
            'consultaConsulta' => $this->basePath . 'Consulta'
        ]);
        
    }        
    
}
