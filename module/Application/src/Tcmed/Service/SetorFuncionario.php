<?php

/*
 * To change this license 
 */

namespace Tcmed\Service;

use Doctrine\ORM\EntityManager;
/**
 * Description of SetorFuncionario Service
 *
 */
class SetorFuncionario extends \Application\Service\AbstractService{

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->basePath = 'Tcmed\Entity\\';
        
        $this->entity = $this->basePath . "SetorFuncionario";        
        $this->id = 'idSetorFuncionario';
        
        $this->setDataRefArray([
            'funcionarioIdFuncionario' => $this->basePath . 'Funcionario'
        ]);
        $this->setDataRefArray([
            'setorSetor' => $this->basePath . 'Setor'
        ]);
        
    }        
    
}
