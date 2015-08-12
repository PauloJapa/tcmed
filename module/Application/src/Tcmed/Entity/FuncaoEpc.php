<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FuncaoEpc
 *
 * @ORM\Table(name="tcmed_funcao_epc", indexes={@ORM\Index(name="fk_tcmed_funcao_has_tcmed_epc_tcmed_epc1_idx", columns={"id_epc"}), @ORM\Index(name="fk_tcmed_funcao_has_tcmed_epc_tcmed_funcao1_idx", columns={"id_funcao"}), @ORM\Index(name="fk_Id_funcao_epc_tcmed_risco1_idx", columns={"id_risco"})})
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\FuncaoEpcRepository")
 * @author Allan Davini
 */
class FuncaoEpc extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_funcao_epc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFuncaoEpc;

    /**
     * @var boolean
     *
     * @ORM\Column(name="eficaz", type="boolean", nullable=true)
     */
    private $eficaz;

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
     * @var \Epc
     *
     * @ORM\ManyToOne(targetEntity="Epc")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_epc", referencedColumnName="id_epc")
     * })
     */
    private $idEpc;

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
        return $this->getIdFuncaoEpc();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdFuncaoEpc($id);
    }
    
    /**
     * 
     * @return integer
     */
    function getIdFuncaoEpc() {
        return $this->idFuncaoEpc;
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
    function getIdFuncao() {
        return $this->idFuncao;
    }

    /**
     * 
     * @return string
     */
    function getIdEpc() {
        return $this->idEpc;
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
     * @param integer $idFuncaoEpc
     */
    function setIdFuncaoEpc($idFuncaoEpc) {
        $this->idFuncaoEpc = $idFuncaoEpc;
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
     * @param \Tcmed\Entity\Funcao $idFuncao
     */
    function setIdFuncao(\Tcmed\Entity\Funcao $idFuncao) {
        $this->idFuncao = $idFuncao;
    }

    /**
     * 
     * @param \Tcmed\Entity\Epc $idEpc
     */
    function setIdEpc(\Tcmed\Entity\Epc $idEpc) {
        $this->idEpc = $idEpc;
    }

    /**
     * 
     * @param \Tcmed\Entity\Risco $idRisco
     */
    function setIdRisco(\Tcmed\Entity\Risco $idRisco) {
        $this->idRisco = $idRisco;
    }


}

