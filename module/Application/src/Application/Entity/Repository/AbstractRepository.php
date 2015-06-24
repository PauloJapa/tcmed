<?php

/*
 * Licenced for AEM and Tecnomed.
 */

namespace Application\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AbstractRepository
 * Todos os metodos de auxilio para consulta
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
}
