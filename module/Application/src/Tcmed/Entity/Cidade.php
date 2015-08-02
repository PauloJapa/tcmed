<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cidade
 *
 * @ORM\Table(name="tcmed_cidade", indexes={@ORM\Index(name="fk_cidade_estado1_idx", columns={"estado_id_estado"})})
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\CidadeRepository")
 */
class Cidade extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cidade", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCidade;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_cidade", type="string", length=100, nullable=false)
     */
    private $nomeCidade;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'A';

    /**
     * @var \Estado
     *
     * @ORM\ManyToOne(targetEntity="Estado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estado_id_estado", referencedColumnName="id_estado")
     * })
     */
    private $estadoEstado;

    /**
     * 
     * @return String
     */
    public function getId() {
        return $this->getIdCidade();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdCidade($id);
    }

    /**
     * 
     * @return integer
     */
    public function getIdCidade() {
        return $this->idCidade;
    }

    /**
     * 
     * @return string
     */
    public function getNomeCidade() {
        return $this->nomeCidade;
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
    public function getEstadoEstado() {
        return $this->estadoEstado;
    }

    /**
     * 
     * @param integer $idCidade
     * @return \Tcmed\Entity\Cidade
     */
    public function setIdCidade($idCidade) {
        $this->idCidade = $idCidade;
        return $this;
    }

    /**
     * 
     * @param string $nomeCidade
     * @return \Tcmed\Entity\Cidade
     */
    public function setNomeCidade($nomeCidade) {
        $this->nomeCidade = $nomeCidade;
        return $this;
    }

    /**
     * 
     * @param string $status
     * @return \Tcmed\Entity\Cidade
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    /**
     * 
     * @param \Tcmed\Entity\Estado $estadoEstado
     * @return \Tcmed\Entity\Cidade
     */
    public function setEstadoEstado(\Tcmed\Entity\Estado $estadoEstado) {
        $this->estadoEstado = $estadoEstado;
        return $this;
    }


}

