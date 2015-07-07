<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form;

/**
 * Description of User
 *
 * @author Paulo Watakabe
 */
class Usuario extends AbstractForm{
    
    
    public function __construct($name = 'usuario', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('usuario', $options);
        
        $this->setInputFilter(new Filter\userFilter);
        
        $this->setInputHidden('idUsuario');
        
        $this->setInputText2('nomeUsuario', 'Nome: ',['placeholder'=>'Entre com o nome']);
        
        $this->setInputText2('nickname', 'Login: ',['placeholder'=>'Entre com o Login']);
        
        $this->setInputText2('senhaUsuario', 'Password: ',['placeholder'=>'Entre com o senha']);
        
        $this->setInputText2('confirmation', 'Redigite: ',['placeholder'=>'Redigite a senha']);
        
        $this->setInputText2('emailUsuario', 'Email: ',['placeholder'=>'Entre com o email']);
        
        $selectOptions = ["A" => "Ativo","C" => "Cancelado"];
        $this->setInputSelect('situacao', 'Status: ', $selectOptions);
        
        $this->setInputText('lembreteSenha', 'Lembrete: ',['placeholder'=>'Entre com o lembrete para senha']);
        
        $selectOptionsTipo = ["admin" => "Administrador","guest" => "Visitante","recep" => "Recepção","adm" => "Adiministradora"];
        $this->setInputSelect('tipo', 'Tipo de Usuario: ', $selectOptionsTipo,['placeholder'=>'Se é Admin, Guest, recepção e etc...']);
        
        $selectOptionsRole = $this->getAllRoles();
        $this->setInputSelect('role', 'Papel de : ', $selectOptionsRole,['placeholder'=>'Papel desse usuario no sistema']);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar: ');
        
    }
    
    public function getAllRoles() {
        /* @var $repository \Application\Entity\Repository\AppRoleRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\AppRole");
        return $repository->fetchParent();
    }
    
}
