<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * hold
 *
 * @ORM\Table(name="tcmed_hold", indexes={@ORM\Index(name="fk_hold_contato1_idx", columns={"contato_id_contato"}), @ORM\Index(name="ref_adm", columns={"referencia_adm"}), @ORM\Index(name="index4", columns={"referencia_tcmed"}), @ORM\Index(name="fk_tcmed_hold_tcmed_endereco1_idx", columns={"endereco_id"})})
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\HoldRepository")
 * @author Danilo Dorotheu
 */
class Hold extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_hold", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHold;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_hold", type="string", length=100, nullable=false)
     */
    private $nomeHold;

    /**
     * @var string
     *
     * @ORM\Column(name="fantasia_hold", type="string", length=70, nullable=true)
     */
    private $fantasiaHold;

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
     * @ORM\Column(name="referencia_hold", type="string", length=45, nullable=true)
     */
    private $referenciaHold;

    /**
     * @var integer
     *
     * @ORM\Column(name="referencia_tcmed", type="integer", nullable=true)
     */
    private $referenciaTcmed;

    /**
     * @var string
     *
     * @ORM\Column(name="referencia_adm", type="string", length=15, nullable=true)
     */
    private $referenciaAdm;

    /**
     * @var \Tcmed\Entity\Contato
     *
     * @ORM\ManyToOne(targetEntity="Contato")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contato_id_contato", referencedColumnName="id_contato")
     * })
     */
    private $contatoContato;

    /**
     * @var \Tcmed\Entity\Endereco
     *
     * @ORM\ManyToOne(targetEntity="Endereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="endereco_id", referencedColumnName="id_endereco")
     * })
     */
    private $endereco;
    
    public function __construct(array $options = array()) {
        parent::__construct($options);
        $this->createdAt = new \DateTime("now");
    }

    /**
     * Alias
     * @return integer
     */
    public function getId() {
        return $this->getIdHold();
    }
    
    public function getIdHold() {
        return $this->idHold;
    }

    public function getNomeHold() {
        return $this->nomeHold;
    }

    public function getFantasiaHold() {
        return $this->fantasiaHold;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getCreatedAt($obj = FALSE, $full = FALSE) {
        return $this->dateToStr($this->createdAt, $full, $obj);
    }
    
    public function getStatus() {
        return $this->status;
    }

    public function getReferenciaHold() {
        return $this->referenciaHold;
    }

    public function getReferenciaTcmed() {
        return $this->referenciaTcmed;
    }

    public function getReferenciaAdm() {
        return $this->referenciaAdm;
    }

    public function getContatoContato() {
        return $this->contatoContato;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setId($idHold) {
        $this->setIdHold($idHold);
        return $this;
    }

    public function setIdHold($idHold) {
        $this->idHold = $idHold;
        return $this;
    }

    public function setNomeHold($nomeHold) {
        $this->nomeHold = $nomeHold;
        return $this;
    }

    public function setFantasiaHold($fantasiaHold) {
        $this->fantasiaHold = $fantasiaHold;
        return $this;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
        return $this;
    }

    public function setCreatedAt(\DateTime $createdAt) {
        $this->createdAt = $this->strToDate($createdAt);
        return $this;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    public function setReferenciaHold($referenciaHold) {
        $this->referenciaHold = $referenciaHold;
        return $this;
    }

    public function setReferenciaTcmed($referenciaTcmed) {
        $this->referenciaTcmed = $referenciaTcmed;
        return $this;
    }

    public function setReferenciaAdm($referenciaAdm) {
        $this->referenciaAdm = $referenciaAdm;
        return $this;
    }

    public function setContatoContato(\Tcmed\Entity\Contato $contatoContato) {
        $this->contatoContato = $contatoContato;
        return $this;
    }

    public function setEndereco(\Tcmed\Entity\Endereco $endereco) {
        $this->endereco = $endereco;
        return $this;
    }


}

