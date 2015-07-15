<?php

namespace Application\Controller;

use Zend\Authentication\AuthenticationService,
    Zend\Authentication\Storage\Session as SessionStorage;
use Application\Form\Login as LoginForm;

class AuthController extends CrudController {

    public function indexAction() {
        $form = new LoginForm($this->getTerminalBoolean());
        $error = false;
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $data = $request->getPost()->toArray();
                // Criando Storage para gravar sessão da authtenticação
                $sessionStorage = new SessionStorage($this->moduloName);
                $auth = new AuthenticationService;
                $auth->setStorage($sessionStorage); // Definindo o SessionStorage para a auth
                $authAdapter = $this->getServiceLocator()->get($this->moduloName . "\Auth\Adapter");
                $authAdapter->setUsername($data['email'])->setPassword($data['password']);
                $result = $auth->authenticate($authAdapter);
                if ($result->isValid()) {
                    $sessionStorage->write($auth->getIdentity()['user'], null);
                    return $this->setRedirect(['controller' => 'index']);
                } else {
                    $error = true;
                }
            }
        }
        $dataView = $this->getDataView('Login no Sistema.');
        $dataView['LOGIN'] = TRUE;        
        return $this->makeView(compact("form","error","dataView"));
    }

    public function logoutAction() {
        $auth = new AuthenticationService;
        $auth->setStorage(new SessionStorage($this->moduloName));
        $auth->clearIdentity();

        return $this->redirect()->toRoute('application-auth');
    }

}
