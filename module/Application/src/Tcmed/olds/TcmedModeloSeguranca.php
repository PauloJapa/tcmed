<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModeloSeguranca
 *
 * @ORM\Table(name="tcmed_modelo_seguranca")
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\EpcRepository")
 * @author Danilo Dorotheu 
 */
class ModeloSeguranca
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_modeloSeguranca", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModeloseguranca;

    /**
     * @var integer
     *
     * @ORM\Column(name="funcao_risco_id_funcao_risco", type="integer", nullable=false)
     */
    private $funcaoRiscoIdFuncaoRisco;

    /**
     * @var integer
     *
     * @ORM\Column(name="funcao_epi_id_funcao_epi", type="integer", nullable=false)
     */
    private $funcaoEpiIdFuncaoEpi;

    /**
     * @var integer
     *
     * @ORM\Column(name="funcao_epc_id_funcao_epc", type="integer", nullable=false)
     */
    private $funcaoEpcIdFuncaoEpc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="TcmedEpc", mappedBy="tcmedModeloSegurancaModeloseguranca")
     */
    private $tcmedEpcEpc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="TcmedEpi", mappedBy="tcmedModeloSegurancaModeloseguranca")
     */
    private $tcmedEpiEpi;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="TcmedRisco", mappedBy="tcmedModeloSegurancaModeloseguranca")
     */
    private $tcmedRiscoRisco;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tcmedEpcEpc = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tcmedEpiEpi = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tcmedRiscoRisco = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getId() {
        return $this->getIdModeloseguranca();
    }

    public function getIdModeloseguranca() {
        return $this->idModeloseguranca;
    }

    public function getFuncaoRiscoIdFuncaoRisco() {
        return $this->funcaoRiscoIdFuncaoRisco;
    }

    public function getFuncaoEpiIdFuncaoEpi() {
        return $this->funcaoEpiIdFuncaoEpi;
    }

    public function getFuncaoEpcIdFuncaoEpc() {
        return $this->funcaoEpcIdFuncaoEpc;
    }

    public function getTcmedEpcEpc() {
        return $this->tcmedEpcEpc;
    }

    public function getTcmedEpiEpi() {
        return $this->tcmedEpiEpi;
    }

    public function getTcmedRiscoRisco() {
        return $this->tcmedRiscoRisco;
    }

    public function setId($idModeloseguranca) {
        $this->idModeloseguranca = $idModeloseguranca;
        return $this;
    }

    public function setIdModeloseguranca($idModeloseguranca) {
        $this->idModeloseguranca = $idModeloseguranca;
        return $this;
    }

    public function setFuncaoRiscoIdFuncaoRisco($funcaoRiscoIdFuncaoRisco) {
        $this->funcaoRiscoIdFuncaoRisco = $funcaoRiscoIdFuncaoRisco;
        return $this;
    }

    public function setFuncaoEpiIdFuncaoEpi($funcaoEpiIdFuncaoEpi) {
        $this->funcaoEpiIdFuncaoEpi = $funcaoEpiIdFuncaoEpi;
        return $this;
    }

    public function setFuncaoEpcIdFuncaoEpc($funcaoEpcIdFuncaoEpc) {
        $this->funcaoEpcIdFuncaoEpc = $funcaoEpcIdFuncaoEpc;
        return $this;
    }

    public function setTcmedEpcEpc(\Doctrine\Common\Collections\Collection $tcmedEpcEpc) {
        $this->tcmedEpcEpc = $tcmedEpcEpc;
        return $this;
    }

    public function setTcmedEpiEpi(\Doctrine\Common\Collections\Collection $tcmedEpiEpi) {
        $this->tcmedEpiEpi = $tcmedEpiEpi;
        return $this;
    }

    public function setTcmedRiscoRisco(\Doctrine\Common\Collections\Collection $tcmedRiscoRisco) {
        $this->tcmedRiscoRisco = $tcmedRiscoRisco;
        return $this;
    }

}

