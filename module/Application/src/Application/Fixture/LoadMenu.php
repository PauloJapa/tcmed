<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\Persistence\ObjectManager;
use Application\Service\AppMenu;

class LoadMenu extends AbstractFixture {

    public function load(ObjectManager $manager) {
        $me = "\Application\Entity\AppMenu";

        $data = array(
            //array('Descricao' => 'Cadastro de clinicas', 'Label' => 'Cadastro de clinicas', 'Route' => 'tcmed/default', 'Controller' => 'clinicas', 'Ordem' => '37', 'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '', 'created_at' => '2015-08-04 11:46:09', 'updated_at' => '2015-08-04 11:46:09', 'Resource' => '', 'Privilege' => ''),
            array('Descricao' => 'Cadastro de clinicas', 'Label' => 'Cadastro de clinicas', 'Route' => 'tcmed/default', 'Controller' => 'clinicas', 'Ordem' => '37', 'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '', 'created_at' => '2015-08-04 11:46:09', 'updated_at' => '2015-08-04 11:46:09', 'Resource' => '', 'Privilege' => ''),
        );

        foreach ($data as $item) {
            $menu = new \Application\Entity\AppMenu($item);
            $manager->persist($menu);
            $manager->flush();
        }
    }

}
