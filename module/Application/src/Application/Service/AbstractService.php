<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractService
 *
 * @author Paulo Watakabe
 */
abstract class AbstractService {

    /**
     *
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;
    
    /**
     * Caminho para entidade a ser trabalhada
     * 
     * @var string 
     */
    protected $entity;
    
    /**
     * Caminha para a pasta base de Entidades
     * @var string
     */
    protected $basePath;
    
    /**
     * Chave no array que representa o id do registro default id
     * @var string
     */
    protected $indexId;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->basePath = 'Application\Entity\\';
        $this->id = 'id';
    }

    public function insert(array $data) {
        $entity = new $this->entity($data);

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

    public function update(array $data) {
        $entity = $this->em->getReference($this->entity, $data[$this->id]);        
        (new Hydrator\ClassMethods)->hydrate($data, $entity);
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

    public function delete($id) {
        $entity = $this->em->getReference($this->entity, $id);
        if ($entity) {
            $this->em->remove($entity);
            $this->em->flush();
            return $id;
        }
    }

} 
