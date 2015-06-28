<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityGrupo
 *
 * @ORM\Table(name="grupo")
 * @ORM\Entity(repositoryClass="\Application\Entity\Repository\GrupoRepository")
 */
class Grupo extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_grupo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idGrupo;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="status_msg", type="string", length=150, nullable=true)
     */
    private $statusMsg;

    /**
     * @var string
     *
     * @ORM\Column(name="status_chat", type="string", length=15, nullable=true)
     */
    private $statusChat;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=true)
     */
    private $status;
    
    public function __toString() {
        return $this->getNome();
    }

    public function getId() {
        return $this->getIdGrupo();
    }
    
    public function setId($idGrupo) {
        return $this->setIdGrupo($idGrupo);
    }

    public function getIdGrupo() {
        return $this->idGrupo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getStatusMsg() {
        return $this->statusMsg;
    }

    public function getStatusChat() {
        return $this->statusChat;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setIdGrupo($idGrupo) {
        $this->idGrupo = $idGrupo;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setStatusMsg($statusMsg) {
        $this->statusMsg = $statusMsg;
        return $this;
    }

    public function setStatusChat($statusChat) {
        $this->statusChat = $statusChat;
        return $this;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

}

