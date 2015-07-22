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

/*
    public function indexAction() {
    	$dataPost = $this->getRequest()->getPost();
    	return parent::indexAction()
    }
*/  
}

