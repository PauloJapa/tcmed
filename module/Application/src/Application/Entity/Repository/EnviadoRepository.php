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
    
    public function getHistory($data) {  
        //Trata os filtro para data mensal
//        $data['userid']= eu;
//        $data['from']= user ou grupo;
//        $data['period']= today, week ou month;
        $this->parameters['inicio'] = new \DateTime('now');
        $this->parameters['fim'] = clone $this->parameters['inicio'];
        switch ($data['period']) {
            case 'week':
                $this->parameters['fim']->sub(new \DateInterval('P7D'));
                break;
            case 'month':
                $this->parameters['fim']->sub(new \DateInterval('P1M'));
                break;
            default:
                $this->parameters['fim']->sub(new \DateInterval('PT12H'));
        }
        
        $this->where = 'e.dateEnviado BETWEEN :fim AND :inicio';   
        if(0 === strpos($data['from'], 'us')){            
            $this->where .= ' AND e.toUser = :from AND e.fromUser = :userId';
            $this->parameters['from'] = str_replace('us', '', $data['from']);
            $this->parameters['userId'] = str_replace('us', '', $data['userId']);
        }else{
            $this->where .= ' AND e.toGrupo = :from AND e.fromUser = :userId';
            $this->parameters['from'] = str_replace('gr', '', $data['from']);
            $this->parameters['userId'] = str_replace('us', '', $data['userId']);
            
        }
//        echo '<pre>' , var_dump($data);
//        echo '<pre>' , var_dump($this->where);
//        echo '<pre>' , var_dump($this->parameters);
//        die;
        // Monta a dql para fazer consulta no BD
        $qb = $this->getEntityManager()
                ->createQueryBuilder()
                ->select('e')
                ->from('Application\Entity\Enviado', 'e')
                ->where($this->where)
                ->setParameters($this->parameters)
                ->orderBy('e.dateEnviado'); 
        
        return $qb->getQuery()->getResult();
    }
    
}
