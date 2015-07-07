<?php

/*
 * To change this license 
 */

namespace Application\Form;

/**
 * Description of AppMenu
 *
 * @author Paulo Watakabe <email>watakabe05@gmail.com</email>
 */
class AppMenu extends AbstractForm{
    
    
    public function __construct($name = 'AppMenu', $options = array()) {
        if(is_object($name) AND $name instanceof \Doctrine\ORM\EntityManager){         
            $this->em = $name;
        }
        parent::__construct('AppMenu', $options);
        
        $this->setInputFilter(new Filter\AppMenuFilter);
        
        $this->setInputHidden('idMenu');
        
        $this->setInputText2('descricao', 'Descrição: ',['placeholder'=>'Entre com a descrição']);
        
        $this->setSimpleText('label');
        $this->setSimpleText('route');
        $this->setSimpleText('controller');
        $this->setSimpleText('action');
        $this->setSimpleText('atributos');
        $this->setSimpleText('icons');
        $this->setSimpleText('class');
        $this->setSimpleText('pagesContainerClass');
        $this->setSimpleText('wrapClass');
        $this->setSimpleText('resource');
        $this->setSimpleText('ordem');
        
        $selectOptionsParent = $this->getAllParents();
        $this->setInputSelect('inMenu', 'Dentro do menu: ', $selectOptionsParent,['placeholder'=>'Este menu pertence a ? ou não']);
                
        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);
        
        $this->setInputSubmit('submit', 'Salvar: ');
        
    }
    
    public function getAllParents() {
        /* @var $repository \Application\Entity\Repository\AppMenuRepository */
        $repository = $this->em->getRepository($this->moduloName . "\Entity\AppMenu");
        return $repository->fetchParent();
    }
    
    public function setSimpleText($name) {
        $this->setInputText2($name, ucfirst($name). ': ',['placeholder'=>'Digite ' . $name]);
    }
}
