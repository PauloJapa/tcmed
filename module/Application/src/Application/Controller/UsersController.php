<?php

/*
 * License
 */

namespace Application\Controller;

/**
 * Description of GrupoRepository
 *
 * @author Paulo Watakabe <email>watakabe05@gmail.com</email>
 */

class UsersController extends CrudController
{

    public function __construct() {
        parent::__construct('user');
    }
    
    public function indexAction() {
    	$e = $this->getRequest()->getPost()->toArray();
        
        $array = array();
        $contPage = 10;
    	
        if(isset($e['filter']) and !empty($e['filter'])){
            $array[$e['filter']] = "%". $e['value'] . "%";
        }
        
        if(isset($e['quantPage']) and !empty($e['quantPage']) and $e['quantPage'] != -1){
            $contPage = $e['quantPage'];
        }
        
        return parent::indexAction($array, [], [], $contPage);
    }
        
  
}

