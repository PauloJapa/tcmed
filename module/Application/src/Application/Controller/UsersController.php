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
class UsersController extends CrudController {

    public function __construct() {
        parent::__construct('user');
    }

    public function indexAction() {
        $e = $this->getRequest()->getPost()->toArray();

        $array = array();

        if (isset($e['filter']) and ! empty($e['filter'])) {
            $array[$e['filter']] = "%" . $e['value'] . "%";
        }

        return parent::indexAction($array);
    }

    public function parametersAction() {
        //$e = $this->getRequest()->getPost()->toArray();
        $repository = $this->getEm()->getRepository($this->moduloName . "\Entity\Contato");
    }

}
