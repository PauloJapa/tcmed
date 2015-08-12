<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Epi
 *
 * @ORM\Table(name="tcmed_epi")
  * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\EpiRepository")
 * @author Allan Davini
 */
class Epi extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_epi", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEpi;

    /**
     * @var string
     *
     * @ORM\Column(name="epi", type="string", length=200, nullable=false)
     */
    private $epi;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="date", nullable=false)
     */
    private $dtCadastro;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Modeloseguranca", inversedBy="idEpi")
     * @ORM\JoinTable(name="tcmed_epi_mod",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_epi", referencedColumnName="id_epi")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_modeloSeguranca", referencedColumnName="id_modeloSeguranca")
     *   }
     * )
     */
    private $idModeloseguranca;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idModeloseguranca = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * 
     * @return String
     */
    public function getId() {
        return $this->getIdEpi();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdEpi($id);
    }
    
    /**
     * 
     * @return integer
     */
    function getIdEpi() {
        return $this->idEpi;
    }

    /**
     * 
     * @return string
     */
    function getEpi() {
        return $this->epi;
    }

    /**
     * 
     * @return string
     */
    function getStatus() {
        return $this->status;
    }

    /**
     * 
     * @return \DateTime | string
     */
    public function getDtCadastro($obj = FALSE, $full = FALSE) {
        return $this->dateToStr($this->dtCadastro, $full, $obj);
    }

    /**
     * 
     * @return string
     */
    function getIdModeloseguranca() {
        return $this->idModeloseguranca;
    }

    /**
     * 
     * @param integer $idEpi
     */
    function setIdEpi($idEpi) {
        $this->idEpi = $idEpi;
    }

    /**
     * 
     * @param string $epi
     */
    function setEpi($epi) {
        $this->epi = $epi;
    }

    /**
     * 
     * @param string $status
     */
    function setStatus($status) {
        $this->status = $status;
    }

    /**
     * 
     * @param \DateTime $dtCadastro
     * @return \Tcmed\Entity\Epi
     */
    public function setDtCadastro($dtCadastro) {        
        $this->dtCadastro = $this->strToDate($dtCadastro);
        return $this;
    }

    /**
     * 
     * @param \Doctrine\Common\Collections\Collection $idModeloseguranca
     */
    function setIdModeloseguranca(\Doctrine\Common\Collections\Collection $idModeloseguranca) {
        $this->idModeloseguranca = $idModeloseguranca;
    }



}

