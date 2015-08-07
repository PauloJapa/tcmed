<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture,
 Doctrine\Common\Persistence\ObjectManager; 

use Application\Entity\AppRole;

class LoadRule extends AbstractFixture {
    
    public function load(ObjectManager $manager) {
        $data = [
//            [
//                "nomeUsuario"   => "",
//                "nickname"      => "",
//                "senhaUsuario"  => "123",
//                "emailUsuario"  => "",
//                "situacao"      => "A",
//                "is_admin"      => true,
//                "lembreteSenha" => "senha padrão",
//                "active"        => true,
//                "tipoUsuario"   => "admin",
//                "role"          => $roleAdmin, 
//            ],
            [
                "nome"      => "Admin",
                "isAdmin"  => "1",
            ],
        ];
        
        foreach ($data as $item) {
            $user = new AppRole($item);
            $manager->persist($user);            
        }
        
        $manager->flush();
    }  
    
}



