<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Risco
 *
 * @ORM\Table(name="tcmed_risco")
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\EpiRepository")
 * @author Allan Davini
 */
class Risco extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_risco", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRisco;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=60, nullable=true)
     */
    private $descricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_inclusao", type="date", nullable=true)
     */
    private $dtInclusao;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=true)
     */
    private $status;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Modeloseguranca", inversedBy="idRisco")
     * @ORM\JoinTable(name="tcmed_risco_mod",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_risco", referencedColumnName="id_risco")
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
        return $this->getIdRisco();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdRisco($id);
    }

    /**
     * 
     * @return integer
     */
    function getIdRisco() {
        return $this->idRisco;
    }

    /**
     * 
     * @return string
     */
    function getDescricao() {
        return $this->descricao;
    }

    /**
     * 
     * @return \DateTime | string
     */
    public function getDtInclusao($obj = FALSE, $full = FALSE) {
        return $this->dateToStr($this->dtinclusao, $full, $obj);
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
     * @return string
     */
    function getIdModeloseguranca() {
        return $this->idModeloseguranca;
    }

    /**
     * 
     * @param integer $idRisco
     */
    function setIdRisco($idRisco) {
        $this->idRisco = $idRisco;
    }

    /**
     * 
     * @param string $descricao
     */
    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    /**
     * 
     * @param \DateTime $dtInclusao
     * @return \Tcmed\Entity\Epi
     */
    public function setDtInclusao($dtInclusao) {        
        $this->dtInclusao = $this->strToDate($dtInclusao);
        return $this;
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
     * @param \Doctrine\Common\Collections\Collection $idModeloseguranca
     */
    function setIdModeloseguranca(\Doctrine\Common\Collections\Collection $idModeloseguranca) {
        $this->idModeloseguranca = $idModeloseguranca;
    }


}

