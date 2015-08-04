<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\Persistence\ObjectManager;
use Application\Service\AppMenu;

class LoadMenu extends AbstractFixture {

    public function load(ObjectManager $manager) {
        $me = "\Application\Entity\AppMenu";
        
       $data = array(
 /*0*/ array('Descricao' => 'home',                           'Label' => 'Home',                 'Route' => 'app/default',   'Controller' => 'index',           'Ordem' => '001',         'Action' => 'index',  'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '', 'created_at' => '2015-07-03 17:48:35', 'updated_at' => '2015-07-03 17:48:35', 'Resource' => NULL, 'Privilege' => NULL),
 /*4*/ array('Descricao' => 'parametros',                     'Label' => 'Parametros',           'Route' => 'app/default',   'Controller' => 'parametros',      'Ordem' => '005',         'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '', 'created_at' => '2015-07-06 09:05:50', 'updated_at' => '2015-07-06 09:05:50', 'Resource' => NULL, 'Privilege' => NULL),
 /*5*/ array('Descricao' => 'Menu do sistema',                'Label' => 'Menu',                 'Route' => 'app/default',   'Controller' => 'appMenus',        'Ordem' => '00',          'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-search', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',  'created_at' => '2015-07-06 10:14:53', 'updated_at' => '2015-07-06 10:14:53', 'Resource' => NULL, 'Privilege' => NULL),
 /*15*/array('Descricao' => 'Cadastro de estados',            'Label' => 'Estado',               'Route' => 'end/default',   'Controller' => 'ufs',             'Ordem' => '020',         'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                          'created_at' => '2015-07-21 11:24:37', 'updated_at' => '2015-07-21 11:24:37', 'Resource' => '', 'Privilege' => ''),
 /*16*/array('Descricao' => 'Cadastro de Cidades',            'Label' => 'Cidade',               'Route' => 'end/default',   'Controller' => 'cidades',         'Ordem' => '020',         'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                      'created_at' => '2015-07-21 13:42:49', 'updated_at' => '2015-07-21 13:42:49', 'Resource' => '', 'Privilege' => ''),
 /*17*/array('Descricao' => 'Cadastro de Enderecos',          'Label' => 'Endereco',             'Route' => 'end/default',   'Controller' => 'enderecos',       'Ordem' => '020',         'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                    'created_at' => '2015-07-21 14:47:07', 'updated_at' => '2015-07-21 14:47:07', 'Resource' => '', 'Privilege' => ''),
 /*18*/array('Descricao' => 'Cadastro de Pais',               'Label' => 'Pais',                 'Route' => 'tcmed/default', 'Controller' => 'pais',            'Ordem' => '020',         'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                         'created_at' => '2015-07-23 09:29:24', 'updated_at' => '2015-07-23 09:29:24', 'Resource' => '', 'Privilege' => ''),
 /*19*/array('Descricao' => 'Cadastro de Estados',            'Label' => 'Estado',               'Route' => 'tcmed/default', 'Controller' => 'estados',         'Ordem' => '020',         'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                      'created_at' => '2015-07-23 10:06:49', 'updated_at' => '2015-07-23 10:06:49', 'Resource' => '', 'Privilege' => ''),
 /*20*/array('Descricao' => 'Cadastro de Cidades',            'Label' => 'Cidade',               'Route' => 'tcmed/default', 'Controller' => 'cidades',         'Ordem' => '020',         'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                      'created_at' => '2015-07-23 13:24:41', 'updated_at' => '2015-07-23 13:24:41', 'Resource' => '', 'Privilege' => ''),
 /*21*/array('Descricao' => 'Cadastro de Bairros',            'Label' => 'Bairro',               'Route' => 'tcmed/default', 'Controller' => 'bairros',         'Ordem' => '020',         'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                      'created_at' => '2015-07-23 14:26:46', 'updated_at' => '2015-07-23 14:26:46', 'Resource' => '', 'Privilege' => ''),
 /*22*/array('Descricao' => 'Cadastro de Enderecos',          'Label' => 'Endereco',             'Route' => 'tcmed/default', 'Controller' => 'enderecos',       'Ordem' => '020',         'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                    'created_at' => '2015-07-24 13:54:23', 'updated_at' => '2015-07-24 13:54:24', 'Resource' => '', 'Privilege' => ''),
 /*23*/array('Descricao' => 'Cadastro Logradouro',            'Label' => 'Logradouro',           'Route' => 'tcmed/default', 'Controller' => 'logradouros',     'Ordem' => '020',         'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                  'created_at' => '2015-07-24 14:02:44', 'updated_at' => '2015-07-24 14:02:44', 'Resource' => '', 'Privilege' => ''),
 /*24*/array('Descricao' => 'Cadastro de Tipo de Logradouro', 'Label' => 'Tipo De Logradouro',   'Route' => 'tcmed/default', 'Controller' => 'tipologradouros', 'Ordem' => '020',         'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',              'created_at' => '2015-07-24 14:28:08', 'updated_at' => '2015-07-24 14:28:08', 'Resource' => '', 'Privilege' => ''),
 /*25*/array('Descricao' => 'Cadastro de Riscos',             'Label' => 'Cadastro de Riscos',   'Route' => 'tcmed/default', 'Controller' => 'riscos',          'Ordem' => '40',          'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-user', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                         'created_at' => '2015-08-03 14:31:56', 'updated_at' => '2015-08-03 14:31:56', 'Resource' => '', 'Privilege' => ''),
 /*26*/array('Descricao' => 'Cids',                           'Label' => 'Cids',                 'Route' => 'tcmed/default', 'Controller' => 'cids',            'Ordem' => '31',          'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-user', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                           'created_at' => '2015-08-03 16:19:01', 'updated_at' => '2015-08-03 16:19:01', 'Resource' => '', 'Privilege' => ''),
 /*27*/array('Descricao' => 'Cadastro de Setor',              'Label' => 'Cadastro de Setores',  'Route' => 'tcmed/default', 'Controller' => 'setores',         'Ordem' => '32',          'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                      'created_at' => '2015-08-04 09:23:19', 'updated_at' => '2015-08-04 09:23:19', 'Resource' => '', 'Privilege' => ''),
 /*28*/array('Descricao' => 'Cadastro de Perguntas',          'Label' => 'Cadastro de Perguntas','Route' => 'tcmed/default', 'Controller' => 'perguntas',       'Ordem' => '33',          'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                    'created_at' => '2015-08-04 10:34:01', 'updated_at' => '2015-08-04 10:34:01', 'Resource' => '', 'Privilege' => ''),
 /*29*/array('Descricao' => 'Cadastro de EPIs',               'Label' => 'Cadastro de EPIs',     'Route' => 'tcmed/default', 'Controller' => 'epis',            'Ordem' => '35',          'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                         'created_at' => '2015-08-04 11:46:09', 'updated_at' => '2015-08-04 11:46:09', 'Resource' => '', 'Privilege' => '')
 );

        foreach ($data as $item) {
            $menu = new \Application\Entity\AppMenu($item);
            $manager->persist($menu);
            $manager->flush();
        }

    }

}
