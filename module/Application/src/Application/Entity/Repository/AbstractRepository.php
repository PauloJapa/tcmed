<?php

/*
 * Licenced for AEM and Tecnomed.
 */

namespace Application\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AbstractRepository
 * Todos os metodos mais usados nas manipulação do BD
 * 
 * @author Paulo Cordeiro Watakabe <watakabe05@gmail.com>
 */
abstract class AbstractRepository  extends EntityRepository {
        
    /**
     * Converte uma data string em data object no indice apontado.
     * @param string $date
     * @return \DateTime
     */
    public function dateToObject($date=''){
        //Trata as variveis data string para data objetos
        if(empty($date)){
            return FALSE;
        }
        
        if(is_object($date)){
            if ($date instanceof \DateTime) {
                return $date;
            } else {
                return FALSE;
            }
        }
       
        $dat = explode("/", $date);
        return new \DateTime($dat[1] . '/' . $dat[0] . '/' . $dat[2]);
    }    
    
    /**
     * Converte um string para obj datetime se for um string valida
     * Faz tratamento da string 
     * @param type $strDateTime
     * @return \DateTime
     */
    public function strToDate($strDateTime) {
        switch (TRUE) {
            case empty($strDateTime):
                return new \DateTime('now');
                
            case ($strDateTime[2] == '/'):
                if(isset($strDateTime[15])){
                    $dh = explode(' ', $strDateTime);
                    $d = explode('/', $dh[0]);
                    $h = $dh[1];
                }else{
                    $d = explode('/', $strDateTime);
                    $h = '';
                }
                $s = $d[2] . '-' . $d[1] . '-' . $d[0] . $h;
                break;
                
            default:
                $s = $strDateTime;
        }
        return new \DateTime($s);
    }
    
    /**
     * Auto complete em ajax esta função retorna as entitys encontradas
     * com a ocorrencia passada por parametro
     * @param string $user
     * @return array
     */
    public function autoComp($user){
        $query = $this->getEntityManager()
                ->createQueryBuilder()
                ->select('e')
                ->from($this->_entityName, 'e')
                ->where("e.nome LIKE :nome")
                ->setParameter('nome', trim($user))
                ->setMaxResults(20)
                ->getQuery()
                ;
        return $query->getResult();
    }
    
    /**
     * Retorna um array com os pares(id nome) de todos os dados dessa entidade
     * @return array
     */
    public function fetchPairs($methd = 'getNome') {
        /* @var $entity \Application\Entity\ENTIDADE */
        $entities = $this->findAll();
        $array = [];
        foreach ($entities as $entity) {
            $array[$entity->getId()] = call_user_method($methd , $entity);
        }
        return $array;
    }
    
}
