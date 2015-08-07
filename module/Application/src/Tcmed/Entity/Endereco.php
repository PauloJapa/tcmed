<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Endereco
 *
 * @ORM\Table(name="tcmed_endereco", indexes={@ORM\Index(name="fk_endereco_logradouro1_idx", columns={"logradouro_id"})})
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\EnderecoRepository")
 * @author Allan Davini
 */
class Endereco extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_endereco", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEndereco;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=20, nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="complemento", type="string", length=100, nullable=true)
     */
    private $complemento;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=true)
     */
    private $status = 'A';

    /**
     * @var \Logradouro
     *
     * @ORM\ManyToOne(targetEntity="Logradouro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="logradouro_id", referencedColumnName="id_logradouro")
     * })
     */
    private $logradouro;
    
    /**
     * 
     * @return String
     */
    public function getId() {
        return $this->getIdEndereco();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdEndereco($id);
    }

    /**
     * 
     * @return integer
     */
    public function getIdEndereco() {
        return $this->idEndereco;
    }

    /**
     * 
     * @return string
     */
    public function getNumero() {
        return $this->numero;
    }

    /**
     * 
     * @return string
     */
    public function getComplemento() {
        return $this->complemento;
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
    public function getLogradouro() {
        return $this->logradouro;
    }

    /**
     * 
     * @param integer $idEndereco
     * @return \Tcmed\Entity\Endereco
     */
    public function setIdEndereco($idEndereco) {
        $this->idEndereco = $idEndereco;
        return $this;
    }

    /**
     * 
     * @param string $numero
     * @return \Tcmed\Entity\Endereco
     */
    public function setNumero($numero) {
        $this->numero = $numero;
        return $this;
    }

    /**
     * 
     * @param string $complemento
     * @return \Tcmed\Entity\Endereco
     */
    public function setComplemento($complemento) {
        $this->complemento = $complemento;
        return $this;
    }

    /**
     * 
     * @param string $status
     * @return \Tcmed\Entity\Endereco
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    /**
     * 
     * @param \Tcmed\Entity\Logradouro $logradouro
     * @return \Tcmed\Entity\Endereco
     */
    public function setLogradouro(\Tcmed\Entity\Logradouro $logradouro) {
        $this->logradouro = $logradouro;
        return $this;
    }

    
}

