<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture,
 Doctrine\Common\Persistence\ObjectManager;    

use Application\Entity\Usuario;

class LoadUsuario extends AbstractFixture {
    
    public function load(ObjectManager $manager) {
        
        $roleAdmin = $manager->getReference("\Application\Entity\AppRole", 1);
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
                "nomeUsuario"   => "Paulo Watakabe",
                "nickname"      => "PauloSis",
                "senhaUsuario"  => "123",
                "emailUsuario"  => "watakabe05@gmail.com",
                "situacao"      => "A",
                "is_admin"      => true,
                "lembreteSenha" => "senha padrão",
                "active"        => true,
                "tipoUsuario"   => "admin",
                "role"          => $roleAdmin, 
            ],
        ];
        
        foreach ($data as $item) {
            $user = new Usuario($item);
            $manager->persist($user);            
        }
        
        $manager->flush();
    }  
    
}

