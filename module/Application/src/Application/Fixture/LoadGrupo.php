<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\Persistence\ObjectManager;

use Application\Entity\Grupo;

class LoadGrupo extends AbstractFixture {
    
    public function load(ObjectManager $manager) {
        $grupo = new Grupo();
        $grupo->setNome("AEM Sistemas")
                ->setStatus("A")
                ->setStatusChat("online")
                ->setStatusChat("A galerinha'");
        
        $manager->persist($grupo);
        $manager->flush();
    }

}
