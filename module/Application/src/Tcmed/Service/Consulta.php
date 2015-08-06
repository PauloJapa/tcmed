<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of Consulta Service
 *
 */
class Consulta extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "Consulta";        
        $this->id = 'idConsulta';
        
        $this->setDataRefArray([
            'questionario' => $this->basePath . 'Questionario',
            'cargoCargo' => $this->basePath . 'Cargo',
            'clinicaClinica' => $this->basePath . 'Clinica',
            'medicoMedico' => $this->basePath . 'Medico',
            'setorSetor' => $this->basePath . 'Setor'
        ]);
        
    }        
    
}
