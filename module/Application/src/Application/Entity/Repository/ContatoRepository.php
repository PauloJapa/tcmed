<?php

/*
 * License
 */

namespace Application\Entity\Repository;

/**
 * Description of GrupoRepository
 *
 * @author Paulo Watakabe <email>watakabe05@gmail.com</email>
 */
class ContatoRepository extends AbstractRepository {
    
    public function getMyContactAndGrupos(array $user) {
        /* @var $userRep \Application\Entity\Repository\UserRepository */
        /* @var $userChat \Application\Entity\User */
        /* @var $contato \Application\Entity\Contato */
        $userRep = $this->getEntityManager()->getRepository("\Application\Entity\User");
        $userChat = $userRep->findOneByUsuarioId($user['idUsuario']);        
        if(!$userChat){
            return [];
        }
        $contatos = $this->findByUserUser($userChat->getId());
        
        $Grupos = $this->findByContatoUser($userChat->getId());
        foreach ($Grupos as $contato) {            
            if($contato->getGrupoGrupo() instanceof \Application\Entity\Grupo){
                $contatosGrupo = $this->findByGrupoGrupo($contato->getGrupoGrupo()->getIdGrupo());
                $contatos['grupo' . $contato->getGrupoGrupo()->getIdGrupo()] = $contato->getGrupoGrupo();
                $contatos['grupos' . $contato->getGrupoGrupo()->getIdGrupo()] = $contatosGrupo;
            }
        }      
        
        return $contatos;
    }
    
    public function getUpgradedStatusUser($where, $parameters) {
        $qb = $this->getEntityManager()
            ->createQueryBuilder()
            ->from('Application\Entity\Contato', 'c')
            ->select('c, co')
            ->join('c.contatoUser', 'co')
            ->where($where)
            ->setParameters($parameters);
        
        return $qb->getQuery()->getResult();
        
    }
}
