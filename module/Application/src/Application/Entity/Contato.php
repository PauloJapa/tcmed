<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityContato
 *
 * @ORM\Table(name="contato", indexes={@ORM\Index(name="fk_contato_user_idx", columns={"user_id_user"}), @ORM\Index(name="fk_contato_user1_idx", columns={"contato_id_user"}), @ORM\Index(name="fk_contato_grupo1_idx", columns={"grupo_id_grupo"})})
 * @ORM\Entity(repositoryClass="\Application\Entity\Repository\ContatoRepository")
 */
class Contato extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_contato", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idContato;

    /**
     * @var \Application\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id_user", referencedColumnName="id_user", nullable=true)
     * })
     */
    private $userUser;

    /**
     * @var \Application\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contato_id_user", referencedColumnName="id_user")
     * })
     */
    private $contatoUser;

    /**
     * @var \Application\Entity\Grupo
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Grupo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grupo_id_grupo", referencedColumnName="id_grupo", nullable=true)
     * })
     */
    private $grupoGrupo;
    
    public function getId() {
        return $this->getIdContato();
    }
    
    public function setId($idContato) {
        return $this->setIdContato($idContato);
    }

    public function getIdContato() {
        return $this->idContato;
    }

    public function getUserUser() {
        if(is_null($this->userUser)){
            return '-';
        }
        return $this->userUser;
    }

    public function getContatoUser() {
        return $this->contatoUser;
    }

    public function getGrupoGrupo() {
        if(is_null($this->grupoGrupo)){
            return '-';
        }
        return $this->grupoGrupo;
    }

    public function setIdContato($idContato) {
        $this->idContato = $idContato;
        return $this;
    }

    /**
     * 
     * @param \Application\Entity\User $userUser
     * @return \Application\Entity\Contato
     */
    public function setUserUser($userUser) {
        $this->userUser = $userUser;
        return $this;
    }

    /**
     * 
     * @param \Application\Entity\User $contatoUser
     * @return \Application\Entity\Contato
     */
    public function setContatoUser(\Application\Entity\User $contatoUser) {
        $this->contatoUser = $contatoUser;
        return $this;
    }

    /**
     * 
     * @param \Application\Entity\Grupo $grupoGrupo
     * @return \Application\Entity\Contato
     */
    public function setGrupoGrupo($grupoGrupo) {
        $this->grupoGrupo = $grupoGrupo;
        return $this;
    }

}

