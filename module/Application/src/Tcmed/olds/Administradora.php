<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Administradora
 *
 * @ORM\Table(name="tcmed_administradora", indexes={@ORM\Index(name="fk_administradora_hold1_idx", columns={"hold_id"}), @ORM\Index(name="fk_administradora_contato1_idx", columns={"contato_id"}), @ORM\Index(name="fk_tcmed_administradora_tcmed_hold1_idx", columns={"hold_virtual"}), @ORM\Index(name="index5", columns={"referencia_tcmed"}), @ORM\Index(name="fk_tcmed_administradora_tcmed_endereco1_idx", columns={"endereco_id"})})
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\AdministradoraRepository")
 * @ORM\HasLifecycleCallbacks
 * @author Danilo Dorotheu
 */
class Administradora extends \Application\Entity\AbstractEntity{

    /**
     * @var integer
     *
     * @ORM\Column(name="id_administradora", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAdministradora;

    /**
     * @var string
     *
     * @ORM\Column(name="razao_social", type="string", length=100, nullable=false)
     */
    private $razaoSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="fantasia_administradora", type="string", length=70, nullable=true)
     */
    private $fantasiaAdministradora;

    /**
     * @var string
     *
     * @ORM\Column(name="cnpj", type="string", length=20, nullable=false)
     */
    private $cnpj;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';

    /**
     * @var string
     *
     * @ORM\Column(name="referencia", type="string", length=45, nullable=true)
     */
    private $referencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="referencia_tcmed", type="integer", nullable=false)
     */
    private $referenciaTcmed;

    /**
     * @var \Tcmed\Entity\Contato
     *
     * @ORM\ManyToOne(targetEntity="Contato")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contato_id", referencedColumnName="id_contato")
     * })
     */
    private $contato;

    /**
     * @var \Tcmed\Entity\Hold
     *
     * @ORM\ManyToOne(targetEntity="Hold")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hold_id", referencedColumnName="id_hold")
     * })
     */
    private $hold;

    /**
     * @var \Tcmed\Entity\Endereco
     *
     * @ORM\ManyToOne(targetEntity="Endereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="endereco_id", referencedColumnName="id_endereco")
     * })
     */
    private $endereco;

    /**
     * @var \Tcmed\Entity\Hold
     *
     * @ORM\ManyToOne(targetEntity="Hold")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hold_virtual", referencedColumnName="id_hold")
     * })
     */
    private $holdVirtual;

    public function __construct(array $options = array()) {
        parent::__construct($options);
        $this->createdAt = new \DateTime("now");
    }

    /**
     * Alias
     * @return integer
     */
    public function getId() {
        return $this->getIdAdministradora();
    }

    public function getIdAdministradora() {
        return $this->idAdministradora;
    }

    public function getRazaoSocial() {
        return $this->razaoSocial;
    }

    public function getFantasiaAdministradora() {
        return $this->fantasiaAdministradora;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getReferencia() {
        return $this->referencia;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function getReferenciaTcmed() {
        return $this->referenciaTcmed;
    }

    public function getContato() {
        return $this->contato;
    }

    public function getHold() {
        return $this->hold;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getHoldVirtual() {
        return $this->holdVirtual;
    }

    /**
     * Alias
     * @param integer $idAdministradora
     * @return \Tcmed\Entity\Administradora
     */
    public function setId($idAdministradora) {
        $this->setIdAdministradora($idAdministradora);
        return $this;
    }

    public function setIdAdministradora($idAdministradora) {
        $this->idAdministradora = $idAdministradora;
        return $this;
    }

    public function setRazaoSocial($razaoSocial) {
        $this->razaoSocial = $razaoSocial;
        return $this;
    }

    public function setFantasiaAdministradora($fantasiaAdministradora) {
        $this->fantasiaAdministradora = $fantasiaAdministradora;
        return $this;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
        return $this;
    }

    public function setCreatedAt(\DateTime $createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    public function setReferencia($referencia) {
        $this->referencia = $referencia;
        return $this;
    }

    /**
     * 
     * @ORM\PrePersist
     * @param \DateTime $updatedAt
     * @return \Tcmed\Entity\Administradora
     */
    public function setUpdatedAt() {
        $this->updatedAt = new \DateTime("now");
        return $this;
    }

    public function setReferenciaTcmed($referenciaTcmed) {
        $this->referenciaTcmed = $referenciaTcmed;
        return $this;
    }

    public function setContato(\Tcmed\Entity\Contato $contato) {
        $this->contato = $contato;
        return $this;
    }

    public function setHold(\Tcmed\Entity\Hold $hold) {
        $this->hold = $hold;
        return $this;
    }

    public function setEndereco(\Tcmed\Entity\Endereco $endereco) {
        $this->endereco = $endereco;
        return $this;
    }

    public function setHoldVirtual(\Tcmed\Entity\Hold $holdVirtual) {
        $this->holdVirtual = $holdVirtual;
        return $this;
    }

    
}
