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

    protected $em;
    protected $entity;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function insert(array $data) {
        $entity = new $this->entity($data);

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

    public function update(array $data) {
        $entity = $this->em->getReference($this->entity, $data['id']);
        (new Hydrator\ClassMethods($data, $entity));
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
