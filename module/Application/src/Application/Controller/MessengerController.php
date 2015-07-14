<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MessengerController extends AbstractActionController {

    public function __construct() {
        parent::__construct('messenger');
    }

    /**
     * Atualiza cadastro de seu novo status.
     * @return Zend\View\Model\ViewModel
     */
    public function sendStatusAction() {
        $data = $this->getService()->getChangeStatusUser($this->getRequest()->getPost());
        return $this->makeView(compact("data"));
    }

    /**
     * Atualiza messenger se algum contato dele trocou de status ou msg de status.
     * @return Zend\View\Model\ViewModel
     */
    public function receiveStatusAction() {
        $dataPost = $this->getRequest()->getPost();
        $service = $this->getService();
        $data = $service->getUpgradedStatusUser($dataPost);
        return $this->makeView(compact("data"));
    }

    /**
     * Devolte a tela do chat um arquivo html simples
     *
     * @return Zend\View\Model\ViewModel
     */
    public function getHistoryAction() {
        $dataPost = $this->getRequest()->getPost();
        $service = $this->getService();
        $data = $service->getHistory($dataPost);
        return $this->makeView(compact("data"));
    }

    /**
     * Devolte a tela do chat um arquivo html simples
     *
     * @return Zend\View\Model\ViewModel
     */
    public function getHtmlAction() {
        return $this->makeView([]);
    }

    /**
     * Pegar todos os contatos e grupos do usuario para carregar na lista.
     *
     * @return Zend\View\Model\ViewModel
     */
    public function receiveContactsAction() {
        /* @var $repository \Application\Entity\Repository\ContatoRepository */
        $repository = $this->getEm()->getRepository($this->moduloName . "\Entity\Contato");
        $data = $repository->getMyContactAndGrupos($this->getUser());
        $service = $this->getService();
        $user = $service->whoIam($this->getUser());
        return $this->makeView(compact("data", "user"));
    }

    /**
     * Busca na base de dados todas as mensagem não recebidas
     * Carrega as mensagem ainda não recebidas e marca as mesmas para não receber em
     * duplicidade.
     * @return Zend\View\Model\ViewModel
     */
    public function receiveMsgAction() {
        /* @var $repository \Application\Entity\Repository\EnviadoRepository */
        $repository = $this->getEm()->getRepository($this->moduloName . "\Entity\Enviado");
        $mensagens = $repository->getMsgNotReceived($this->getUser());
        return $this->makeView(compact('mensagens'));
    }

    /**
     * Grava mensagem enviado pelo chat para um contato ou grupo
     *
     * @return Zend\View\Model\ViewModel
     */
    public function sendMsgAction() {
        $request = $this->getRequest();
        $msgdata = $request->getPost();
        $service = $this->getService();
        $service->sendMensagem($msgdata);
        return $this->makeView([]);
    }

    /**
     * Devolve para o chat os dados do usuario do chat
     *
     * @return Zend\View\Model\ViewModel
     */
    public function whoiamAction() {
        $service = $this->getService();
        $meUser = $service->whoIam($this->getUser());

        return $this->makeView(compact('meUser'));
    }

    public function editMsgStatusAction() {
        $data = $this->getService()->ChangeStatusMsgUser($this->getRequest()->getPost());
        return $this->makeView(compact("data"));
    }

}
