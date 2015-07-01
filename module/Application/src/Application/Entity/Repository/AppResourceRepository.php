<?php

/*
 * To change this license
 */

namespace Application\Entity\Repository;

/**
 * Description of AppResourceRepository
 *
 * @author Paulo Watakabe <email>watakabe05@gmail.com</email>
 */
class AppResourceRepository extends AbstractRepository {

    public function fetchPairs() {
        /* @var $entity \Application\Entity\AppResource */
        $entities = $this->findAll();
        $array = [];
        foreach ($entities as $entity) {
            $array[$entity->getId()] = $entity->getName();
        }
        return $array;
    }
}
