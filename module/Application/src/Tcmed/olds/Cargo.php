<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cargo
 *
 * @ORM\Table(name="tcmed_cargo", indexes={@ORM\Index(name="fk_cargo_modeloSeguranca1_idx", columns={"modeloSeguranca_id_modeloSeguranca"}), @ORM\Index(name="fk_cargo_descricao1_idx", columns={"descricao_id_descricao"})})
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\CargoRepository")
 * @author Danilo Dorotheu
 */
class Cargo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cargo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCargo;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_cargo", type="string", length=45, nullable=true)
     */
    private $nomeCargo;

    /**
     * @var string
     *
     * @ORM\Column(name="cbo", type="string", length=45, nullable=true)
     */
    private $cbo;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="referencia", type="string", length=45, nullable=true)
     */
    private $referencia;

    /**
     * @var \Descricao
     *
     * @ORM\ManyToOne(targetEntity="Descricao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="descricao_id_descricao", referencedColumnName="id_descricao")
     * })
     */
    private $descricaoDescricao;

    /**
     * @var \ModeloSeguranca
     *
     * @ORM\ManyToOne(targetEntity="ModeloSeguranca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modeloSeguranca_id_modeloSeguranca", referencedColumnName="id_modeloSeguranca")
     * })
     */
    private $modelosegurancaModeloseguranca;
    /**
     * Alias
     * @return integer
     */
    public function getId() {
        return $this->getIdCargo();
    }

    public function getIdCargo() {
        return $this->idCargo;
    }

    public function getNomeCargo() {
        return $this->nomeCargo;
    }

    public function getCbo() {
        return $this->cbo;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getReferencia() {
        return $this->referencia;
    }

    public function getDescricaoDescricao() {
        return $this->descricaoDescricao;
    }

    public function getModelosegurancaModeloseguranca() {
        return $this->modelosegurancaModeloseguranca;
    }
    /**
     * Alias SetIdCargo
     * @param integer $idCargo
     * @return \Tcmed\Entity\Cargo
     */
    public function setId($idCargo) {
        $this->setIdCargo($idCargo);
        return $this;
    }

    public function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
        return $this;
    }

    public function setNomeCargo($nomeCargo) {
        $this->nomeCargo = $nomeCargo;
        return $this;
    }

    public function setCbo($cbo) {
        $this->cbo = $cbo;
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

    public function setDescricaoDescricao(\Descricao $descricaoDescricao) {
        $this->descricaoDescricao = $descricaoDescricao;
        return $this;
    }

    public function setModelosegurancaModeloseguranca(\ModeloSeguranca $modelosegurancaModeloseguranca) {
        $this->modelosegurancaModeloseguranca = $modelosegurancaModeloseguranca;
        return $this;
    }
}