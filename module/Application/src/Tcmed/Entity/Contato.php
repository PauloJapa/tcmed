<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contato
 *
 * @ORM\Table(name="tcmed_contato", indexes={@ORM\Index(name="fk_tcmed_contato_tcmed_endereco1_idx", columns={"endereco_id"})})
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\ContatoRepository")
 * @author Allan Davini
 */
class Contato extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_contato", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idContato;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_contato", type="string", length=70, nullable=false)
     */
    private $nomeContato;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';

    /**
     * @var string
     *
     * @ORM\Column(name="rg", type="string", length=20, nullable=true)
     */
    private $rg;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=20, nullable=true)
     */
    private $cpf;

    /**
     * @var \Endereco
     *
     * @ORM\ManyToOne(targetEntity="Endereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="endereco_id", referencedColumnName="id_endereco")
     * })
     */
    private $endereco;

    /**
     * 
     * @return string
     */
    public function getId() {
        return $this->getIdContato();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdContato($id);
    }
    
    /**
     * 
     * @return integer
     */
    function getIdContato() {
        return $this->idContato;
    }

    /**
     * 
     * @return string
     */
    function getNomeContato() {
        return $this->nomeContato;
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
    function getRg() {
        return $this->rg;
    }

    /**
     * 
     * @return string
     */
    function getCpf() {
        return $this->cpf;
    }

    /**
     * 
     * @return string
     */
    function getEndereco() {
        return $this->endereco;
    }

    /**
     * 
     * @param integer $idContato
     */
    function setIdContato($idContato) {
        $this->idContato = $idContato;
    }

    /**
     * 
     * @param string $nomeContato
     */
    function setNomeContato($nomeContato) {
        $this->nomeContato = $nomeContato;
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
     * @param string $rg
     */
    function setRg($rg) {
        $this->rg = $rg;
    }

    /**
     * 
     * @param string $cpf
     */
    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    /**
     * 
     * @param \Tcmed\Entity\Endereco $endereco
     */
    function setEndereco(\Tcmed\Entity\Endereco $endereco) {
        $this->endereco = $endereco;
    }



}

