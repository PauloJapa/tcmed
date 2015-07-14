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
    
    
    /**
     * Procura no sistema novas mensagem para o usuario do sistema.
     * Se houver novas mensagens devolve para o o navegador
     * E marcar essas mensagens como lida para não enviar novamente
     * 
     * @param array $user
     * @return array
     */
    public function getMsgNotReceived(array $user){
        /* @var $userRep \Application\Entity\Repository\UserRepository */
        /* @var $userChat \Application\Entity\User */
        /* @var $receive \Application\Entity\Enviado */
        $userRep = $this->getEntityManager()->getRepository("\Application\Entity\User");
        $userChat = $userRep->findOneByUsuarioId($user['idUsuario']);        
        if(!$userChat){
            return [];
        }
        
        $receives = $this->findBy([
            'toUser' => $userChat->getId(),
            'dateRecebido' => $this->strToDate('15/01/1950 12:01:00')
        ]);
        
        if(empty($receives)){
            return [];
        }
        
        $em = $this->getEntityManager();
        foreach ($receives as $receive){
            $receive->setDateRecebido(new \DateTime('now'));
            $em->persist($receive);
        }
        $em->flush();        
        
        return $receives;
    }
    
    public function getEnviadoDql($where, array $parameters, $orderBy = 'e.dateEnviado') { 
        // Monta a dql para fazer consulta no BD
        $qb = $this->getEntityManager()
                ->createQueryBuilder()
                ->select('e, m, u, tu, g')
                ->from('Application\Entity\Enviado', 'e')
                ->join('e.mensagemMensagem', 'm')
                ->join('e.fromUser', 'u')
                ->join('e.toUser', 'tu')
                ->join('e.toGrupo', 'g')
                ->where($where)
                ->setParameters($parameters)
                ->orderBy($orderBy); 
        
        return $qb->getQuery()->getResult();
    }
    
}
