<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityUser
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="\Application\Entity\Repository\UserRepository")
 */
class User extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
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
    
    public function getId() {
        return $this->getIdUser();
    }
    
    public function setId($idUser) {
        return $this->setIdUser($idUser);
    }
    
    public function getIdUser() {
        return $this->idUser;
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getStatusChat() {
        return $this->statusChat;
    }

    public function getStatusDatetime($obj = FALSE) {
        if($obj){
            return $this->statusDatetime;
        }else{
            return $this->dateToStr($this->statusDatetime, TRUE);
        }
    }

    public function getStatusMsg() {
        return $this->statusMsg;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
        return $this;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

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
        if(is_string($statusDatetime)){
            $statusDatetime = $this->strToDate($statusDatetime);
        }
        $this->statusDatetime = $statusDatetime;
        return $this;
    }

    public function setStatusMsg($statusMsg) {
        $this->statusMsg = $statusMsg;
        return $this;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

}

