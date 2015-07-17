<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityUser
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="\Application\Entity\Repository\UserRepository")
 */
class User extends AbstractEntity {

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * Id que faz referencia ao usuario do sistema na tabela usuario caso exista
     * @var integer
     * 
     * @ORM\Column(name="usuario_id", type="integer", nullable=true)
     */
    private $usuarioId;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="status_chat", type="string", length=15, nullable=true)
     */
    private $statusChat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="status_datetime", type="datetime", nullable=true)
     */
    private $statusDatetime = '2001-01-15 12:01:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="access_datetime", type="datetime", nullable=true)
     */
    private $accessDatetime = '2001-01-15 12:01:00';

    /**
     * @var string
     *
     * @ORM\Column(name="status_msg", type="string", length=45, nullable=true)
     */
    private $statusMsg;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=true)
     */
    private $status;

    public function __construct(array $options = []) {
        $this->statusDatetime = new \DateTime($this->statusDatetime);
        parent::__construct($options);
    }

    /**
     * Retorna o nome do user no chat
     * @return string
     */
    public function __toString() {
        return $this->getNome();
    }

    /**
     * Alias para metodo getIdUser()
     * @return integer
     */
    public function getId() {
        return $this->getIdUser();
    }

    /**
     * Alias para metodo setIdUser()
     * @param integer $id
     * @return type
     */
    public function setId($id) {
        return $this->setIdUser($id);
    }

    /**
     * 
     * @return integer
     */
    public function getIdUser() {
        return $this->idUser;
    }

    /**
     * ID do usuario na tabela usuario do sistema
     * @return integer
     */
    public function getUsuarioId() {
        return $this->usuarioId;
    }

    /**
     * 
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * 
     * @return string
     */
    public function getStatusChat() {
        return $this->statusChat;
    }

    /**
     * 
     * @return string | \DateTime
     */
    public function getStatusDatetime($obj = FALSE, $full = FALSE) {
        return $this->dateToStr($this->statusDatetime, $full, $obj);
    }

    /**
     * 
     * @return string | \DateTime
     */
    public function getAccessDatetime($obj = FALSE, $full = FALSE) {
        return $this->dateToStr($this->accessDatetime, $full, $obj);
    }

    public function getStatusMsg() {
        return $this->statusMsg;
    }

    /**
     * 
     * @return string | \DateTime
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * 
     * @param interger $idUser
     * @return \Application\Entity\User
     */
    public function setIdUser($idUser) {
        $this->idUser = $idUser;
        return $this;
    }

    /**
     * O id da tabela usuario do sistema para referencia no chat
     * @param integer $usuarioId
     * @return \Application\Entity\User
     */
    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
        return $this;
    }

    /**
     * 
     * @param string $nome
     * @return \Application\Entity\User
     */
    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    /**
     * 
     * @param string $statusChat
     * @return \Application\Entity\User
     */
    public function setStatusChat($statusChat) {
        $this->statusChat = $statusChat;
        return $this;
    }

    /**
     * 
     * @param \DateTime | string   $statusDatetime
     * @return \Application\Entity\User
     */
    public function setStatusDatetime($statusDatetime) {
        $this->statusDatetime = $this->strToDate($statusDatetime);
        return $this;
    }

    /**
     * 
     * @param \DateTime | string   $statusDatetime
     * @return \Application\Entity\User
     */
    public function setAccessDatetime($accessDatetime) {
        $this->accessDatetime = $this->strToDate($accessDatetime);
        return $this;
    }

    /**
     * 
     * @param string $statusMsg
     * @return \Application\Entity\User
     */
    public function setStatusMsg($statusMsg) {
        $this->statusMsg = $statusMsg;
        return $this;
    }

    /**
     * 
     * @param string $status
     * @return \Application\Entity\User
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

}
