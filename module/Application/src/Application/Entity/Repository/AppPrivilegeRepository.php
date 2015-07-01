<?php

/*
 * To change this license
 */

namespace Application\Entity\Repository;

/**
 * Description of AppPrivilegeRepository
 *
 * @author Paulo Watakabe <email>watakabe05@gmail.com</email>
 */
class AppPrivilegeRepository extends AbstractRepository {

    public function fetchPairs() {
        /* @var $entity \Application\Entity\AppPrivilege */
        $entities = $this->findAll();
        $array = [];
        foreach ($entities as $entity) {
            $array[$entity->getId()] = $entity->getNome();
        }
        return $array;
    }
}
