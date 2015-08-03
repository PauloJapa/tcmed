<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\Persistence\ObjectManager;
use Application\Service\AppMenu;

class LoadMenu extends AbstractFixture {

    public function load(ObjectManager $manager) {
        $data = [
//            [
//                "Descricao"           => "",
//                "Label"               => "",
//                "Route"               => "",
//                "Controller"          => "",
//                "Action"              => "",
//                "Atributos"           => "",
//                "Icons"               => "",
//                "Class"               => "",
//                "PagesContainerClass" => "",
//                "WrapClass"           => "",
//                "Resource"            => "",
//                "Privilege"           => "",
//                "Ordem"               => "",
//                "InMenu"              => null,
//            ],
            [
                "Descricao"           => "home",
                "Label"               => "Home",
                "Route"               => "app/default",
                "Controller"          => "index",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "001",
                "InMenu"              => null,
            ],
            [
                "Descricao" => "Cadastra Novo Risco",
                "Label" => "Cadastra Risco",
                "Route" => "tcmed/default",
                "Controller" => "riscos",
                "Action" => "index",
                "Atributos" => "",
                "Icons" => "fa-pencil",
                "Class" => "",
                "PagesContainerClass" => "",
                "WrapClass" => "",
                "Resource" => "",
                "Privilege" => "",
                "Ordem" => "031",
                "InMenu" => null,
            ],
        ];

        $service = new AppMenu($manager);
        $service->setFlush(FALSE);
        foreach ($data as $item) {
            $service->insert($item);
        }

        $manager->flush();
    }

}
