<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EpiFuncao
 *
 * @ORM\Table(name="tcmed_epi_funcao", indexes={@ORM\Index(name="fk_tcmed_epi_has_tcmed_funcao_tcmed_funcao1_idx", columns={"id_funcao"}), @ORM\Index(name="fk_tcmed_epi_has_tcmed_funcao_tcmed_epi1_idx", columns={"id_epi"}), @ORM\Index(name="fk_tcmed_epi_funcao_tcmed_risco1_idx", columns={"id_risco"})})
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\EpiFuncaoRepository")
 * @author Allan Davini
 */
class EpiFuncao extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_epi_funcao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEpiFuncao;

    /**
     * @var boolean
     *
     * @ORM\Column(name="eficaz", type="boolean", nullable=true)
     */
    private $eficaz;

    /**
     * @var \Epi
     *
     * @ORM\ManyToOne(targetEntity="Epi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_epi", referencedColumnName="id_epi")
     * })
     */
    private $idEpi;

    /**
     * @var \Funcao
     *
     * @ORM\ManyToOne(targetEntity="Funcao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_funcao", referencedColumnName="id_funcao")
     * })
     */
    private $idFuncao;

    /**
     * @var \Risco
     *
     * @ORM\ManyToOne(targetEntity="Risco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_risco", referencedColumnName="id_risco")
     * })
     */
    private $idRisco;

    /**
     * 
     * @return String
     */
    public function getId() {
        return $this->getIdEpiFuncao();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdEpiFuncao($id);
    }
    
    /**
     * 
     * @return integer
     */
    function getIdEpiFuncao() {
        return $this->idEpiFuncao;
    }

    /**
     * 
     * @return boolean
     */
    function getEficaz() {
        return $this->eficaz;
    }

    /**
     * 
     * @return string
     */
    function getIdEpi() {
        return $this->idEpi;
    }

    /**
     * 
     * @return string
     */
    function getIdFuncao() {
        return $this->idFuncao;
    }

    /**
     * 
     * @return string
     */
    function getIdRisco() {
        return $this->idRisco;
    }

    /**
     * 
     * @param integer $idEpiFuncao
     */
    function setIdEpiFuncao($idEpiFuncao) {
        $this->idEpiFuncao = $idEpiFuncao;
    }

    /**
     * 
     * @param boolean $eficaz
     */
    function setEficaz($eficaz) {
        $this->eficaz = $eficaz;
    }

    /**
     * 
     * @param \Tcmed\Entity\Epi $idEpi
     */
    function setIdEpi(\Tcmed\Entity\Epi $idEpi) {
        $this->idEpi = $idEpi;
    }

    /**
     * 
     * @param \Tcmed\Entity\Funcao $idFuncao
     */
    function setIdFuncao(\Tcmed\Entity\Funcao $idFuncao) {
        $this->idFuncao = $idFuncao;
    }

    /**
     * 
     * @param \Tcmed\Entity\Risco $idRisco
     */
    function setIdRisco(\Tcmed\Entity\Risco $idRisco) {
        $this->idRisco = $idRisco;
    }



}

