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
                "Descricao"           => "privileleges",
                "Label"               => "Privilegios",
                "Route"               => "app/default",
                "Controller"          => "appPrivileges",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "002.001.004",
                "InMenu"              => "8",
            ],
            [
                "Descricao"           => "parametros",
                "Label"               => "Parametros",
                "Route"               => "app/default",
                "Controller"          => "parametros",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "005",
                "InMenu"              => null,
            ],
            [
                "Descricao"           => "Menu do sistema",
                "Label"               => "Menu",
                "Route"               => "app/default",
                "Controller"          => "appMenus",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-search",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "00",
                "InMenu"              => null,
            ],
            [
                "Descricao"           => "Cadastros do Sistema em Geral",
                "Label"               => "Cadastros do Sistema",
                "Route"               => "app/default",
                "Controller"          => "",
                "Action"              => "",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "002",
                "InMenu"              => null,
            ],
            [
                "Descricao"           => "Cadastros Referentes ao Sistema",
                "Label"               => "Sistema Permissões",
                "Route"               => "app/default",
                "Controller"          => "",
                "Action"              => "",
                "Atributos"           => "",
                "Icons"               => "fa-search",
                "Class"               => "",
                "PagesContainerClass" => "nav nav-second-level",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "002.001",
                "InMenu"              => "7",
            ],
            [
                "Descricao"           => "resources",
                "Label"               => "Recursos",
                "Route"               => "app/default",
                "Controller"          => "appResources",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "002.001.003",
                "InMenu"              => "8",
            ],
            [
                "Descricao"           => "roles",
                "Label"               => "Papeis",
                "Route"               => "app/default",
                "Controller"          => "appRoles",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "002.001.002",
                "InMenu"              => "8",
            ],
            [
                "Descricao"           => "Crud para Usuario",
                "Label"               => "Usuarios do Sistema",
                "Route"               => "app/default",
                "Controller"          => "usuarios",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "nav nav-third-level",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "002.001.001",
                "InMenu"              => "8",
            ],
            [
                "Descricao"           => "Mensagem do Chat",
                "Label"               => "Mensagem",
                "Route"               => "app/default",
                "Controller"          => "mensagems",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "002.002.004",
                "InMenu"              => "15",
            ],
            [
                "Descricao"           => "Registrar os envios de mensagem",
                "Label"               => "Enviado",
                "Route"               => "app/default",
                "Controller"          => "enviados",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "002.002.005",
                "InMenu"              => "15",
            ],
            [
                "Descricao"           => "usuario do chat",
                "Label"               => "user",
                "Route"               => "app/default",
                "Controller"          => "users",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-user",
                "Class"               => "",
                "PagesContainerClass" => "nav nav-third-level",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "002.002.001",
                "InMenu"              => "15",
            ],
            [
                "Descricao"           => "Contatos",
                "Label"               => "Contatos",
                "Route"               => "app/default",
                "Controller"          => "contatos",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-user",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "002.002.003",
                "InMenu"              => "15",
            ],
            [
                "Descricao"           => "Grupos",
                "Label"               => "Grupos",
                "Route"               => "app/default",
                "Controller"          => "grupos",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-user",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "002.002.002",
                "InMenu"              => "15",
            ],
            [
                "Descricao"           => "Sistema chat",
                "Label"               => "Sistema Chat",
                "Route"               => "app/default",
                "Controller"          => "",
                "Action"              => "",
                "Atributos"           => "",
                "Icons"               => "fa-search",
                "Class"               => "",
                "PagesContainerClass" => "nav nav-second-level",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "002.002",
                "InMenu"              => "7",
            ],
            [
                "Descricao"           => "Cadastro de estados",
                "Label"               => "Estado",
                "Route"               => "app/default",
                "Controller"          => "ufs",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "020",
                "InMenu"              => null,
            ],
            [
                "Descricao"           => "Cadastro de Cidades",
                "Label"               => "Cidade",
                "Route"               => "app/default",
                "Controller"          => "cidades",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "020",
                "InMenu"              => null,
            ],
            [
                "Descricao"           => "Cadastro de Enderecos",
                "Label"               => "Endereco",
                "Route"               => "app/default",
                "Controller"          => "enderecos",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "020",
                "InMenu"              => null,
            ],
            [
                "Descricao"           => "Cadastro Logradouro",
                "Label"               => "Logradouro",
                "Route"               => "app/default",
                "Controller"          => "logradouros",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "020",
                "InMenu"              => null,
            ],
            [
                "Descricao"           => "Cadastro de Tipo de Logradouro",
                "Label"               => "Tipo De Logradouro",
                "Route"               => "app/default",
                "Controller"          => "tipologradouros",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "020",
                "InMenu"              => null,
            ],
            [
                "Descricao"           => "Forma de Contato",
                "Label"               => "Forma de Contato",
                "Route"               => "app/default",
                "Controller"          => "tipomeiocontatar",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "020",
                "InMenu"              => null,
            ],
            [
                "Descricao"           => "Cadastro Cid",
                "Label"               => "Cadastro Cid",
                "Route"               => "app/default",
                "Controller"          => "cids",
                "Action"              => "index",
                "Atributos"           => "",
                "Icons"               => "fa-pencil",
                "Class"               => "",
                "PagesContainerClass" => "",
                "WrapClass"           => "",
                "Resource"            => "",
                "Privilege"           => "",
                "Ordem"               => "020",
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
            $manager->flush();
        }

    }

}
