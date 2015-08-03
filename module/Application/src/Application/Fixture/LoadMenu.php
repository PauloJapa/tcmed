<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\Persistence\ObjectManager;
use Application\Entity\AppMenu;

class LoadMenu extends AbstractFixture {

    public function load(ObjectManager $manager) {
        echo "ola";
        $menu = new AppMenu();
        $menu->setDescricao("home")
                ->setLabel("Home")
                ->setRoute("app/default")
                ->setController("index")
                ->setAction("index")
                ->setIcons("fa-pencil")
                ->setOrdem("001");

        $manager->persist($menu);
        $manager->flush();
    }

}
