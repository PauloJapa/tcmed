<?php

/*
 * To change this license
 */

namespace Application\Entity\Repository;

/**
 * Description of EnviadoRepository
 *
 * @author Paulo Watakabe <email>watakabe05@gmail.com</email>
 */
class EnviadoRepository extends AbstractRepository {
    
    public function receive($userid){
        /*TODO: Precisa arrumar*/
        $receive = $this->findBy([
//            "toUser" => $userid
        ]);
        
        return $receive;
    }
}
