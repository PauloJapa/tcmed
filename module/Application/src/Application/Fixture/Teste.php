<?php
return;

$me = "\Application\Entity\AppMenu";

$data = array(
 /*0*/ array('Descricao' => 'home',                           'Label' => 'Home',                 'Route' => 'app/default',   'Controller' => 'index',           'Ordem' => '001',         'InMenu' => NULL,                                                           'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '', 'created_at' => '2015-07-03 17:48:35', 'updated_at' => '2015-07-03 17:48:35', 'Resource' => NULL, 'Privilege' => NULL),
 /*1*/ array('Descricao' => 'roles',                          'Label' => 'Papeis',               'Route' => 'app/default',   'Controller' => 'appRoles',        'Ordem' => '002.001.002', 'InMenu' => $manager->getReference($me, 7),       'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '', 'created_at' => '2015-07-06 09:03:45', 'updated_at' => '2015-07-06 09:03:45', 'Resource' => '', 'Privilege' => ''),
 /*2*/ array('Descricao' => 'Resources',                      'Label' => 'Recursos',             'Route' => 'app/default',   'Controller' => 'appResources',    'Ordem' => '002.001.003', 'InMenu' => $manager->getReference($me, 7),       'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',  'created_at' => '2015-07-06 09:04:56', 'updated_at' => '2015-07-06 09:04:56', 'Resource' => '', 'Privilege' => ''),
 /*3*/ array('Descricao' => 'Privileleges',                   'Label' => 'Privilegios',          'Route' => 'app/default',   'Controller' => 'appPrivileges',   'Ordem' => '002.001.004', 'InMenu' => $manager->getReference($me, 7),       'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',  'created_at' => '2015-07-06 09:05:50', 'updated_at' => '2015-07-06 09:05:50', 'Resource' => 'mvc:appPrivileges', 'Privilege' => 'ok'),
 /*4*/ array('Descricao' => 'parametros',                     'Label' => 'Parametros',           'Route' => 'app/default',   'Controller' => 'parametros',      'Ordem' => '005',         'InMenu' => NULL,                                 'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '', 'created_at' => '2015-07-06 09:05:50', 'updated_at' => '2015-07-06 09:05:50', 'Resource' => NULL, 'Privilege' => NULL),
 /*5*/ array('Descricao' => 'Menu do sistema',                'Label' => 'Menu',                 'Route' => 'app/default',   'Controller' => 'appMenus',        'Ordem' => '00',          'InMenu' => NULL,                                 'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-search', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',  'created_at' => '2015-07-06 10:14:53', 'updated_at' => '2015-07-06 10:14:53', 'Resource' => NULL, 'Privilege' => NULL),
 /*6*/ array('Descricao' => 'Cadastros do Sistema em Geral',  'Label' => 'Cadastros do Sistema', 'Route' => 'app/default',   'Controller' => '',                'Ordem' => '002',         'InMenu' => NULL,                                 'Action' => '', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',  'created_at' => '2015-07-06 11:52:33', 'updated_at' => '2015-07-06 11:52:33', 'Resource' => '', 'Privilege' => ''),
 /*7*/ array('Descricao' => 'Cadastros referente ao sistema', 'Label' => 'Sistema Permissões',   'Route' => 'app/default',   'Controller' => '',                'Ordem' => '002.001',     'InMenu' => $manager->getReference($me, 6),       'Action' => '', 'Atributos' => '', 'Icons' => 'fa-search', 'Class' => '', 'PagesContainerClass' => 'nav nav-second-level', 'WrapClass' => '',  'created_at' => '2015-07-06 13:04:49', 'updated_at' => '2015-07-06 13:04:49', 'Resource' => '', 'Privilege' => ''),
 /*8*/ array('Descricao' => 'CRUD para usuario',              'Label' => 'Usuarios do Sistema',  'Route' => 'app/default',   'Controller' => 'usuarios',        'Ordem' => '002.001.001', 'InMenu' => $manager->getReference($me, 7),       'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => 'nav nav-third-level', 'WrapClass' => '', 'created_at' => '2015-07-07 13:20:28', 'updated_at' => '2015-07-07 13:20:28', 'Resource' => '', 'Privilege' => ''),
 /*9*/ array('Descricao' => 'Mensagem do chat',               'Label' => 'Mensagem',             'Route' => 'app/default',   'Controller' => 'mensagems',       'Ordem' => '002.002.004', 'InMenu' => '14',                                 'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                    'created_at' => '2015-07-07 15:48:44', 'updated_at' => '2015-07-07 15:48:44', 'Resource' => '', 'Privilege' => ''),
 /*10*/array('Descricao' => 'Registrar os envios de mensagem','Label' => 'Enviado',              'Route' => 'app/default',   'Controller' => 'enviados',        'Ordem' => '002.002.005', 'InMenu' => '14','Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                     'created_at' => '2015-07-08 12:33:52', 'updated_at' => '2015-07-08 12:33:52', 'Resource' => '', 'Privilege' => ''),
 /*11*/array('Descricao' => 'usuario do chat',                'Label' => 'user',                 'Route' => 'app/default',   'Controller' => 'users',           'Ordem' => '002.002.001', 'InMenu' => '14','Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-user', 'Class' => '', 'PagesContainerClass' => 'nav nav-third-level', 'WrapClass' => '',       'created_at' => '2015-07-08 14:18:57', 'updated_at' => '2015-07-08 14:18:57', 'Resource' => '', 'Privilege' => ''),
 /*12*/array('Descricao' => 'Contatos',                       'Label' => 'Contatos',             'Route' => 'app/default',   'Controller' => 'contatos',        'Ordem' => '002.002.003', 'InMenu' => '14','Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-user', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                       'created_at' => '2015-07-10 20:59:55', 'updated_at' => '2015-07-10 20:59:55', 'Resource' => '', 'Privilege' => ''),
 /*13*/array('Descricao' => 'Grupos',                         'Label' => 'Grupos',               'Route' => 'app/default',   'Controller' => 'grupos',          'Ordem' => '002.002.002', 'InMenu' => '14','Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-user', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                         'created_at' => '2015-07-10 21:00:47', 'updated_at' => '2015-07-10 21:00:47', 'Resource' => '', 'Privilege' => ''),
 /*14*/array('Descricao' => 'Sistema chat',                   'Label' => 'Sistema Chat',         'Route' => 'app/default',   'Controller' => '',                'Ordem' => '002.002',     'InMenu' => '6',     'Action' => '', 'Atributos' => '', 'Icons' => 'fa-search', 'Class' => '', 'PagesContainerClass' => 'nav nav-second-level', 'WrapClass' => '',              'created_at' => '2015-07-13 09:34:33', 'updated_at' => '2015-07-13 09:34:33', 'Resource' => '', 'Privilege' => ''),
 /*15*/array('Descricao' => 'Cadastro de estados',            'Label' => 'Estado',               'Route' => 'end/default',   'Controller' => 'ufs',             'Ordem' => '020',         'InMenu' => NULL,        'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                          'created_at' => '2015-07-21 11:24:37', 'updated_at' => '2015-07-21 11:24:37', 'Resource' => '', 'Privilege' => ''),
 /*16*/array('Descricao' => 'Cadastro de Cidades',            'Label' => 'Cidade',               'Route' => 'end/default',   'Controller' => 'cidades',         'Ordem' => '020',         'InMenu' => NULL,        'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                      'created_at' => '2015-07-21 13:42:49', 'updated_at' => '2015-07-21 13:42:49', 'Resource' => '', 'Privilege' => ''),
 /*17*/array('Descricao' => 'Cadastro de Enderecos',          'Label' => 'Endereco',             'Route' => 'end/default',   'Controller' => 'enderecos',       'Ordem' => '020',         'InMenu' => NULL,        'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                    'created_at' => '2015-07-21 14:47:07', 'updated_at' => '2015-07-21 14:47:07', 'Resource' => '', 'Privilege' => ''),
 /*18*/array('Descricao' => 'Cadastro de Pais',               'Label' => 'Pais',                 'Route' => 'tcmed/default', 'Controller' => 'pais',            'Ordem' => '020',         'InMenu' => NULL,        'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                         'created_at' => '2015-07-23 09:29:24', 'updated_at' => '2015-07-23 09:29:24', 'Resource' => '', 'Privilege' => ''),
 /*19*/array('Descricao' => 'Cadastro de Estados',            'Label' => 'Estado',               'Route' => 'tcmed/default', 'Controller' => 'estados',         'Ordem' => '020',         'InMenu' => NULL,        'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                      'created_at' => '2015-07-23 10:06:49', 'updated_at' => '2015-07-23 10:06:49', 'Resource' => '', 'Privilege' => ''),
 /*20*/array('Descricao' => 'Cadastro de Cidades',            'Label' => 'Cidade',               'Route' => 'tcmed/default', 'Controller' => 'cidades',         'Ordem' => '020',         'InMenu' => NULL,        'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                      'created_at' => '2015-07-23 13:24:41', 'updated_at' => '2015-07-23 13:24:41', 'Resource' => '', 'Privilege' => ''),
 /*21*/array('Descricao' => 'Cadastro de Bairros',            'Label' => 'Bairro',               'Route' => 'tcmed/default', 'Controller' => 'bairros',         'Ordem' => '020',         'InMenu' => NULL,        'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                      'created_at' => '2015-07-23 14:26:46', 'updated_at' => '2015-07-23 14:26:46', 'Resource' => '', 'Privilege' => ''),
 /*22*/array('Descricao' => 'Cadastro de Enderecos',          'Label' => 'Endereco',             'Route' => 'tcmed/default', 'Controller' => 'enderecos',       'Ordem' => '020',         'InMenu' => NULL,        'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                    'created_at' => '2015-07-24 13:54:23', 'updated_at' => '2015-07-24 13:54:24', 'Resource' => '', 'Privilege' => ''),
 /*23*/array('Descricao' => 'Cadastro Logradouro',            'Label' => 'Logradouro',           'Route' => 'tcmed/default', 'Controller' => 'logradouros',     'Ordem' => '020',         'InMenu' => NULL,        'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                  'created_at' => '2015-07-24 14:02:44', 'updated_at' => '2015-07-24 14:02:44', 'Resource' => '', 'Privilege' => ''),
 /*24*/array('Descricao' => 'Cadastro de Tipo de Logradouro', 'Label' => 'Tipo De Logradouro',   'Route' => 'tcmed/default', 'Controller' => 'tipologradouros', 'Ordem' => '020',         'InMenu' => NULL,        'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',              'created_at' => '2015-07-24 14:28:08', 'updated_at' => '2015-07-24 14:28:08', 'Resource' => '', 'Privilege' => ''),
 /*25*/array('Descricao' => 'Cadastro de Riscos',             'Label' => 'Cadastro de Riscos',   'Route' => 'tcmed/default', 'Controller' => 'riscos',          'Ordem' => '40',          'InMenu' => NULL,         'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-user', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                         'created_at' => '2015-08-03 14:31:56', 'updated_at' => '2015-08-03 14:31:56', 'Resource' => '', 'Privilege' => ''),
 /*26*/array('Descricao' => 'Cids',                           'Label' => 'Cids',                 'Route' => 'tcmed/default', 'Controller' => 'cids',            'Ordem' => '31',          'InMenu' => NULL,         'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-user', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                           'created_at' => '2015-08-03 16:19:01', 'updated_at' => '2015-08-03 16:19:01', 'Resource' => '', 'Privilege' => ''),
 /*27*/array('Descricao' => 'Cadastro de Setor',              'Label' => 'Cadastro de Setores',  'Route' => 'tcmed/default', 'Controller' => 'setores',         'Ordem' => '32',          'InMenu' => NULL,         'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                      'created_at' => '2015-08-04 09:23:19', 'updated_at' => '2015-08-04 09:23:19', 'Resource' => '', 'Privilege' => ''),
 /*28*/array('Descricao' => 'Cadastro de Perguntas',          'Label' => 'Cadastro de Perguntas','Route' => 'tcmed/default', 'Controller' => 'perguntas',       'Ordem' => '33',          'InMenu' => NULL,         'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                    'created_at' => '2015-08-04 10:34:01', 'updated_at' => '2015-08-04 10:34:01', 'Resource' => '', 'Privilege' => ''),
 /*29*/array('Descricao' => 'Cadastro de EPIs',               'Label' => 'Cadastro de EPIs',     'Route' => 'tcmed/default', 'Controller' => 'epis',            'Ordem' => '35',          'InMenu' => NULL,         'Action' => 'index', 'Atributos' => '', 'Icons' => 'fa-pencil', 'Class' => '', 'PagesContainerClass' => '', 'WrapClass' => '',                         'created_at' => '2015-08-04 11:46:09', 'updated_at' => '2015-08-04 11:46:09', 'Resource' => '', 'Privilege' => '')
 );