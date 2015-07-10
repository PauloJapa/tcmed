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
//        $em->flush();        
        
        return $receives;
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
}
