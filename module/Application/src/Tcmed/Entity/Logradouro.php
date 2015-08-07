<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logradouro
 *
 * @ORM\Table(name="tcmed_logradouro", indexes={@ORM\Index(name="fk_logradouro_bairro1_idx", columns={"bairro_id_bairro"}), @ORM\Index(name="fk_logradouro_tipoLogradouro1_idx", columns={"tipoLogradouro_id_tipoLogradouro"})})
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\LogradouroRepository")
 * @author Allan Davini
 */
class Logradouro extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_logradouro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLogradouro;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_logradouro", type="string", length=60, nullable=false)
     */
    private $nomeLogradouro;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'A';

    /**
     * @var string
     *
     * @ORM\Column(name="cep", type="string", length=10, nullable=false)
     */
    private $cep;

    /**
     * @var \Bairro
     *
     * @ORM\ManyToOne(targetEntity="Bairro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bairro_id_bairro", referencedColumnName="id_bairro")
     * })
     */
    private $bairroBairro;

    /**
     * @var \TipoLogradouro
     *
     * @ORM\ManyToOne(targetEntity="TipoLogradouro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoLogradouro_id_tipoLogradouro", referencedColumnName="id_tipoLogradouro")
     * })
     */
    private $tipologradouroTipologradouro;

    /**
     * 
     * @return String
     */
    public function getId() {
        return $this->getIdLogradouro();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdLogradouro($id);
    }
    
    /**
     * 
     * @return integer
     */
    public function getIdLogradouro() {
        return $this->idLogradouro;
    }

    /**
     * 
     * @return string
     */
    public function getNomeLogradouro() {
        return $this->nomeLogradouro;
    }

    /**
     * 
     * @return string
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * 
     * @return string
     */
    public function getCep() {
        return $this->cep;
    }

    /**
     * 
     * @return string
     */
    public function getBairroBairro() {
        return $this->bairroBairro;
    }

    /**
     * 
     * @return string
     */
    public function getTipologradouroTipologradouro() {
        return $this->tipologradouroTipologradouro;
    }

    /**
     * 
     * @param integer $idLogradouro
     * @return \Tcmed\Entity\Logradouro
     */
    public function setIdLogradouro($idLogradouro) {
        $this->idLogradouro = $idLogradouro;
        return $this;
    }

    /**
     * 
     * @param string $nomeLogradouro
     * @return \Tcmed\Entity\Logradouro
     */
    public function setNomeLogradouro($nomeLogradouro) {
        $this->nomeLogradouro = $nomeLogradouro;
        return $this;
    }

    /**
     * 
     * @param string $status
     * @return \Tcmed\Entity\Logradouro
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    /**
     * 
     * @param string $cep
     * @return \Tcmed\Entity\Logradouro
     */
    public function setCep($cep) {
        $this->cep = $cep;
        return $this;
    }

    /**
     * 
     * @param \Tcmed\Entity\Bairro $bairroBairro
     * @return \Tcmed\Entity\Logradouro
     */
    public function setBairroBairro(\Tcmed\Entity\Bairro $bairroBairro) {
        $this->bairroBairro = $bairroBairro;
        return $this;
    }

    /**
     * 
     * @param \Tcmed\Entity\TipoLogradouro $tipologradouroTipologradouro
     * @return \Tcmed\Entity\Logradouro
     */
    public function setTipologradouroTipologradouro(\Tcmed\Entity\TipoLogradouro $tipologradouroTipologradouro) {
        $this->tipologradouroTipologradouro = $tipologradouroTipologradouro;
        return $this;
    }



}

