<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OcupacaofuncaoEpi
 *
 * @ORM\Table(name="tcmed_ocupacaoFuncao_epi", indexes={@ORM\Index(name="fk_tcmed_ocupacaoFuncao_has_tcmed_epi_tcmed_epi1_idx", columns={"id_epi"}), @ORM\Index(name="fk_tcmed_ocupacaoFuncao_has_tcmed_epi_tcmed_ocupacaoFuncao1_idx", columns={"id_ocupacaoFuncao"})})
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\OcupacaofuncaoEpiRepository")
 * @author Allan Davini
 */
class OcupacaofuncaoEpi extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_ocupacaoFuncao_epi", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOcupacaofuncaoEpi;

    /**
     * @var boolean
     *
     * @ORM\Column(name="eficaz", type="boolean", nullable=true)
     */
    private $eficaz;

    /**
     * @var \Ocupacaofuncao
     *
     * @ORM\ManyToOne(targetEntity="Ocupacaofuncao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ocupacaoFuncao", referencedColumnName="id_ocupacaoFuncao")
     * })
     */
    private $idOcupacaofuncao;

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
     * 
     * @return String
     */
    public function getId() {
        return $this->getIdOcupacaofuncaoEpi();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdOcupacaofuncaoEpi($id);
    }

    /**
     * 
     * @return integer
     */
    function getIdOcupacaofuncaoEpi() {
        return $this->idOcupacaofuncaoEpi;
    }

    /**
     * 
     * @return string
     */
    function getEficaz() {
        return $this->eficaz;
    }

    /**
     * 
     * @return string
     */
    function getIdOcupacaofuncao() {
        return $this->idOcupacaofuncao;
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
     * @param integer $idOcupacaofuncaoEpi
     */
    function setIdOcupacaofuncaoEpi($idOcupacaofuncaoEpi) {
        $this->idOcupacaofuncaoEpi = $idOcupacaofuncaoEpi;
    }

    /**
     * 
     * @param string $eficaz
     */
    function setEficaz($eficaz) {
        $this->eficaz = $eficaz;
    }

    /**
     * 
     * @param \Tcmed\Entity\Ocupacaofuncao $idOcupacaofuncao
     */
    function setIdOcupacaofuncao(\Tcmed\Entity\Ocupacaofuncao $idOcupacaofuncao) {
        $this->idOcupacaofuncao = $idOcupacaofuncao;
    }

    /**
     * 
     * @param \Tcmed\Entity\Epi $idEpi
     */
    function setIdEpi(\Tcmed\Entity\Epi $idEpi) {
        $this->idEpi = $idEpi;
    }


}

