<?php

/*
 * To change this license 
 */

namespace Application\Form;

/**
 * Description of AppPrivilege
 *
 * @author Paulo Watakabe <email>watakabe05@gmail.com</email>
 */
class AppPrivilege extends AbstractForm{
    
    
    public function __construct($name = 'AppPrivilege', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('AppPrivilege', $options);
        
        $this->setInputFilter(new Filter\AppPrivilegeFilter);
        
        $this->setInputHidden('idPrivilege');
        
        $this->setInputText2('nome', 'Nome: ',['placeholder'=>'Entre com o nome']);
        
        $selectOptionsRole = $this->getAllRoles();
        $this->setInputSelect('role', 'Role: ', $selectOptionsRole,['placeholder'=>'Regra para']);
        
        $selectOptionsResouce = $this->getAllResources();
        $this->setInputSelect('resource', 'Resource: ', $selectOptionsResouce,['placeholder'=>'Recurso do sistema']);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar: ');
        
    }
    
    public function getAllRoles() {
        /* @var $repository \Application\Entity\Repository\AppRoleRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\AppRole");
        return $repository->fetchParent();
    }
    
    public function getAllResources() {
        /* @var $repository \Application\Entity\Repository\AppResourceRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\AppResource");
        return $repository->fetchPairs();
    }
}
