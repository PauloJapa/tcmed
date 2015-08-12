<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Funcao
 *
 * @ORM\Table(name="tcmed_funcao", indexes={@ORM\Index(name="fk_funcao_descricao1_idx", columns={"descricao_id_descricao"})})
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\FuncaoRepository")
 */
class Funcao extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_funcao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFuncao;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_funcao", type="string", length=70, nullable=false)
     */
    private $nomeFuncao;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';

    /**
     * @var string
     *
     * @ORM\Column(name="referencia", type="string", length=40, nullable=true)
     */
    private $referencia;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_funcao", type="string", length=45, nullable=true)
     */
    private $codFuncao;

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
     * 
     * @return string
     */
    public function getId() {
        return $this->getIdFuncao();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdFuncao($id);
    }
    
    /**
     * 
     * @return integer
     */
    function getIdFuncao() {
        return $this->idFuncao;
    }

    /**
     * 
     * @return string
     */
    function getNomeFuncao() {
        return $this->nomeFuncao;
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
    function getReferencia() {
        return $this->referencia;
    }

    /**
     * 
     * @return string
     */
    function getCodFuncao() {
        return $this->codFuncao;
    }

    /**
     * 
     * @return string
     */
    function getDescricaoDescricao() {
        return $this->descricaoDescricao;
    }

    /**
     * 
     * @param integer $idFuncao
     */
    function setIdFuncao($idFuncao) {
        $this->idFuncao = $idFuncao;
    }

    /**
     * 
     * @param string $nomeFuncao
     */
    function setNomeFuncao($nomeFuncao) {
        $this->nomeFuncao = $nomeFuncao;
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
     * @param string $referencia
     */
    function setReferencia($referencia) {
        $this->referencia = $referencia;
    }

    /**
     * 
     * @param string $codFuncao
     */
    function setCodFuncao($codFuncao) {
        $this->codFuncao = $codFuncao;
    }

    /**
     * 
     * @param \Tcmed\Entity\Descricao $descricaoDescricao
     */
    function setDescricaoDescricao(\Tcmed\Entity\Descricao $descricaoDescricao) {
        $this->descricaoDescricao = $descricaoDescricao;
    }



}

