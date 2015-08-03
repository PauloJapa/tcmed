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
                "Descricao"           => "teste de fixture",
                "Label"               => "Teste",
                "Route"               => "app/default",
                "Controller"          => "testes",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "030",
                "InMenu"              => null,
            ],
            [
                "Descricao"           => "teste de fixture222",
                "Label"               => "Teste222",
                "Route"               => "app/default",
                "Controller"          => "testes",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "030",
                "InMenu"              => null,
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
