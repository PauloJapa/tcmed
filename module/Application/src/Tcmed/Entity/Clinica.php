<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Entity\AbstractEntity;

/**
 * TcmedClinica
 *
 * @ORM\Table(name="tcmed_clinica", indexes={@ORM\Index(name="fk_clinica_contato1_idx", columns={"contato_id"}), @ORM\Index(name="fk_tcmed_clinica_tcmed_endereco1_idx", columns={"endereco_id"})})
    * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\ClinicaRepository")
 * @author Danilo Dorotheu
 */
class Clinica extends AbstractEntity {

    /**
     * @var integer
     *
     * @ORM\Column(name="id_clinica", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idClinica;

    /**
     * @var string
     *
     * @ORM\Column(name="razao_social", type="string", length=100, nullable=false)
     */
    private $razaoSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="fantasia_clinica", type="string", length=70, nullable=true)
     */
    private $fantasiaClinica;

    /**
     * @var string
     *
     * @ORM\Column(name="cnpj", type="string", length=16, nullable=false)
     */
    private $cnpj;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
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
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status;

    /**
     * @var \Tcmed\Entity\Contato;
     *
     * @ORM\ManyToOne(targetEntity="Contato")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contato_id", referencedColumnName="id_contato")
     * })
     */
    private $contato;

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
     * Initialize this entity
     * @param array $options
     */
    public function __construct(array $options = array()) {
        parent::__construct($options);
        $this->createdAt = new \DateTime("now");
    }

    /**
     * Alias getIdClinica
     * @return integer
     */
    public function getId() {
        return $this->getIdClinica();
    }

    /**
     * @return integer
     */
    public function getIdClinica() {
        return $this->idClinica;
    }

    /**
     * 
     * @return string
     */
    public function getRazaoSocial() {
        return $this->razaoSocial;
    }

    /**
     * 
     * @return string
     */
    public function getFantasiaClinica() {
        return $this->fantasiaClinica;
    }

    /**
     * 
     * @return string
     */
    public function getCnpj() {
        return $this->cnpj;
    }

    /**
     * 
     * @param boolean $obj
     * @param boolean $full
     * @return type
     */
    public function getCreatedAt($obj = FALSE, $full = FALSE) {
        return $this->dateToStr($this->createdAt, $full, $obj);
    }

    /**
     * 
     * @return \DateTime
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * 
     * @return string
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * 
     * @return \Tcmed\Entity\Contato;
     */
    public function getContato() {
        return $this->contato;
    }

    /**
     * 
     * @return \Tcmed\Entity\Endereco;
     */
    public function getEndereco() {
        return $this->endereco;
    }

    /**
     * Alias 
     * @param type $idClinica
     * @return \Tcmed\Entity\Clinica
     */
    public function setId($idClinica) {
        return $this->setIdClinica($idClinica);
    }

    /**
     * 
     * @param type $idClinica
     * @return \Tcmed\Entity\Clinica
     */
    public function setIdClinica($idClinica) {
        $this->idClinica = $idClinica;
        return $this;
    }

    /**
     * 
     * @param type $razaoSocial
     * @return \Tcmed\Entity\Clinica
     */
    public function setRazaoSocial($razaoSocial) {
        $this->razaoSocial = $razaoSocial;
        return $this;
    }

    /**
     * 
     * @param type $fantasiaClinica
     * @return \Tcmed\Entity\Clinica
     */
    public function setFantasiaClinica($fantasiaClinica) {
        $this->fantasiaClinica = $fantasiaClinica;
        return $this;
    }

    /**
     * 
     * @param type $cnpj
     * @return \Tcmed\Entity\Clinica
     */
    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
        return $this;
    }

    /**
     * 
     * @param \DateTime $createdAt
     * @return \Tcmed\Entity\Clinica
     */
    public function setCreatedAt(\DateTime $createdAt) {
        $this->createdAt = $this->strToDate($createdAt);
        return $this;
    }

    /**
     * 
     * @param \DateTime $updatedAt
     * @return \Tcmed\Entity\Clinica
     */
    public function setUpdatedAt(\DateTime $updatedAt) {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * 
     * @param type $status
     * @return \Tcmed\Entity\Clinica
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    /**
     * 
     * @param \Tcmed\Entity\Contato $contato
     * @return \Tcmed\Entity\Clinica
     */
    public function setContato(\Tcmed\Entity\Contato $contato) {
        $this->contato = $contato;
        return $this;
    }

    /**
     * 
     * @param \Tcmed\Entity\Endereco $endereco
     * @return \Tcmed\Entity\Clinica
     */
    public function setEndereco(\Tcmed\Entity\Endereco $endereco) {
        $this->endereco = $endereco;
        return $this;
    }

}
