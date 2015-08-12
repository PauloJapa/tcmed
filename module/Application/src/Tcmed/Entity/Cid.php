<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cid
 *
 * @ORM\Table(name="tcmed_cid")
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\CidRepository")
 * @ORM\HasLifecycleCallbacks
 * @author Danilo Dorotheu
 */
class Cid extends \Application\Entity\AbstractEntity {

    /**
     * @var integer
     *
     * @ORM\Column(name="id_cid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCid;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao_cid", type="string", length=100, nullable=false)
     */
    private $descricaoCid;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_cid", type="string", length=45, nullable=false)
     */
    private $numeroCid;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';

    /**
     * @var string
     *
     * @ORM\Column(name="created_by", type="string", length=45, nullable=true)
     */
    private $createdBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="updated_by", type="string", length=45, nullable=true)
     */
    private $updatedBy;

    /**
     * Construtor
     * @param array $options
     */
    public function __construct(array $options = array()) {
        parent::__construct($options);
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");
    }

    /**
     * Retorna ID da entidade
     * @return integer
     */
    public function getIdCid() {
        return $this->idCid;
    }

    /**
     * Retorna ID da entidade (Alias)
     * @return integer
     */
    public function getId() {
        return $this->getIdCid();
    }

    /**
     * Retorna descricao do CID
     * @return string
     */
    public function getDescricaoCid() {
        return $this->descricaoCid;
    }

    /**
     * Retorna o número do CID
     * @return string
     */
    public function getNumeroCid() {
        return $this->numeroCid;
    }

    /**
     * Retorna o status do CID
     * @return string
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Retorna nome do usuario que criou a entidade CID
     * @return type
     */
    public function getCreatedBy() {
        return $this->createdBy;
    }

    /**
     * Retorna data de desenvolvimento da entidade   
     * @return type
     */
    public function getCreatedAt($obj = FALSE, $full = FALSE) {
        return $this->dateToStr($this->createdAt, $full, $obj);
    }

    /**
     * Retorna data de atualizacao da entidade
     * @return type
     */
    public function getUpdatedAt($obj = FALSE, $full = FALSE) {
        return $this->dateToStr($this->updatedAt, $full, $obj);
    }

    /**
     * Retorna nome do usuário que alterou a entidade
     * @return type
     */
    public function getUpdatedBy() {
        return $this->updatedBy;
    }

    /**
     * Seta um novo numero de identificação da entidade CID
     * @param type $idCid
     * @return \Cid
     */
    public function setIdCid($idCid) {
        $this->idCid = $idCid;
        return $this;
    }

    /**
     * Seta a descricao do CID (Alias)
     * @param type $idCid
     * @return \Cid
     */
    public function setId($idCid) {
        $this->setIdCid($idCid);
        return $this;
    }

    /**
     * Seta a descricao do CID
     * @param type $descricaoCid
     * @return \Cid
     */
    public function setDescricaoCid($descricaoCid) {
        $this->descricaoCid = $descricaoCid;
        return $this;
    }

    /**
     * Seta o número do CID
     * @param type $numeroCid
     * @return \Cid
     */
    public function setNumeroCid($numeroCid) {
        $this->numeroCid = $numeroCid;
        return $this;
    }

    /**
     * Seta o status do CID
     * @param type $status
     * @return \Cid
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    /**
     * Seta nome do usuario que criou o CID
     * @param type $createdBy
     * @return \Cid
     */
    public function setCreatedBy($createdBy) {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Seta a data de desenvolvimento desta entidade
     * @param \DateTime $createdAt
     * @return \Cid
     */
    public function setCreatedAt() {
        $this->createdAt = new \DateTime("now");
        return $this;
    }

    /**
     * Seta data de atualizacao da entidade
     * @ORM\PrePersist
     * @return \Cid
     */
    public function setUpdatedAt() {
        $this->createdAt = new \DateTime("now");
        return $this;
    }

    /**
     * Seta o nomeo do usuário que criou este modelo.
     * @param type $updatedBy
     * @return \Cid
     */
    public function setUpdatedBy($updatedBy) {
        $this->updatedBy = $updatedBy;
        return $this;
    }

}
