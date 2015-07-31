<?php

namespace Application\Fixture;

use 
Doctrine\Common\DataFixtures\AbstractFixture,
 //Doctrine\Common\DataFixtures\FixtureInterface,
    Doctrine\Common\Persistence\ObjectManager;    

use Application\Entity\Usuario;

class LoadUser implements FixtureInterface{
    
    public function load(ObjectManager $manager) {
//        echo 'debug'; die;
        $user = new Usuario();
        $user->setNomeUsuario('Administrador')
                ->setEmailUsuario('admin@admin.com.br')
                ->setSenhaUsuario('123')
                ->setSituacao('A');
        
        $manager->persist($user);
        
        $user = new Usuario();
        $user->setNomeUsuario('Paulo')
                ->setEmailUsuario('watakabe05@gmail.com')
                ->setSenhaUsuario('123')
                ->setSituacao('A');
        
        $manager->persist($user);
        
        $manager->flush();
    }  
    
}

