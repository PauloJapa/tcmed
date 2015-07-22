<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TcmedEstado
 *
 * @ORM\Table(name="tcmed_estado", indexes={@ORM\Index(name="fk_estado_pais1_idx", columns={"pais_id"})})
 * @ORM\Entity
 */
class TcmedEstado extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_estado", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_estado", type="string", length=70, nullable=false)
     */
    private $nomeEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="uf", type="string", length=3, nullable=false)
     */
    private $uf;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=false)
     */
    private $status = 'A';

    /**
     * @var \TcmedPais
     *
     * @ORM\ManyToOne(targetEntity="TcmedPais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais_id", referencedColumnName="id_pais")
     * })
     */
    private $pais;

    public function getId() {
        return $this->getIdEstado();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdEstado($id);
    }
    
    /**
     * 
     * @return integer
     */
    public function getIdEstado() {
        return $this->idEstado;
    }

    
    /**
     * 
     * @return string
     */
    public function getNomeEstado() {
        return $this->nomeEstado;
    }

    
    /**
     * 
     * @return string
     */
    public function getUf() {
        return $this->uf;
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
     * @return \TcmedPais
     */
    public function getPais() {
        return $this->pais;
    }

    /**
     * 
     * @param integer $idEstado
     * @return \Tcmed\Entity\TcmedEstado
     */
    public function setIdEstado($idEstado) {
        $this->idEstado = $idEstado;
        return $this;
    }

    /**
     * 
     * @param string $nomeEstado
     * @return \Tcmed\Entity\TcmedEstado
     */
    public function setNomeEstado($nomeEstado) {
        $this->nomeEstado = $nomeEstado;
        return $this;
    }

    /**
     * 
     * @param string $uf
     * @return \Tcmed\Entity\TcmedEstado
     */
    public function setUf($uf) {
        $this->uf = $uf;
        return $this;
    }

    /**
     * 
     * @param string $status
     * @return \Tcmed\Entity\TcmedEstado
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    /**
     * 
     * @param \TcmedPais $pais
     * @return \Tcmed\Entity\TcmedEstado
     */
    public function setPais(\TcmedPais $pais) {
        $this->pais = $pais;
        return $this;
    }



}

