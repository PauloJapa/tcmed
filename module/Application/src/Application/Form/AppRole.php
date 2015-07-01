<?php

/*
 * To change this license 
 */

namespace Application\Form;

/**
 * Description of AppRole
 *
 * @author Paulo Watakabe <email>watakabe05@gmail.com</email>
 */
class AppRole extends AbstractForm{
    
    
    public function __construct($name = 'AppRole', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('AppRole', $options);
        
        $this->setInputFilter(new Filter\AppRoleFilter);
        
        $this->setInputHidden('idRole');
        
        $this->setInputText2('nome', 'Nome: ',['placeholder'=>'Entre com o nome']);
        
        $selectOptionsParent = array_merge([0 => 'Nenhum'], $this->getAllParents());
        $this->setInputSelect('parent', 'Herda: ', $selectOptionsParent,['placeholder'=>'Herda acesso de alguem!']);
        
        $this->setInputCheckbox('isAdmin', 'Admin ?: ', []);
        
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar: ');
        
    }
    
    public function getAllParents() {
        /* @var $repository \Application\Entity\Repository\AppRoleRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\AppRole");
        return $repository->fetchParent();
    }
}
