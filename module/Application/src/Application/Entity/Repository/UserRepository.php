<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Entity\Repository;

/**
 * Description of UserRepository
 *
 * @author user
 */
class UserRepository extends AbstractRepository {

    /**
     * Auto complete em ajax esta função retorna as entitys encontradas
     * com a ocorrencia passada por parametro
     * @param string $user
     * @return array
     */
    public function autoComp($user){
        $query = $this->getEntityManager()
                ->createQueryBuilder()
                ->select('u')
                ->from('Application\Entity\User', 'u')
                ->where("u.nome LIKE :nome")
                ->setParameter('nome', trim($user))
                ->setMaxResults(20)
                ->getQuery()
                ;
        return $query->getResult();
    }
    
    
    public function fetchPairs() {
        /* @var $entity \Application\Entity\User */
        $entities = $this->findAll();
        $array = [];
        foreach ($entities as $entity) {
            $array[$entity->getId()] = $entity->getNome();
        }
        return $array;
    }
}
