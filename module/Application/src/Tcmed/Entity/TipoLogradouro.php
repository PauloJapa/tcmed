<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoLogradouro
 *
 * @ORM\Table(name="tcmed_tipo_logradouro")
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\TipoLogradouroRepository")
 */
class TipoLogradouro extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipoLogradouro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipologradouro;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=20, nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'A';

    /**
     * Metodo padrão para o campo key da tabela
     * @return string
     */
    public function getId() {
        return $this->getIdTipologradouro();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdTipologradouro($id);
    }
    
    /**
     * 
     * @return integer
     */
    public function getIdTipologradouro() {
        return $this->idTipologradouro;
    }

    /**
     * 
     * @return string
     */
    public function getTipo() {
        return $this->tipo;
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
     * @param integer $idTipologradouro
     * @return \Tcmed\Entity\TipoLogradouro
     */
    public function setIdTipologradouro($idTipologradouro) {
        $this->idTipologradouro = $idTipologradouro;
        return $this;
    }

    /**
     * 
     * @param string $tipo
     * @return \Tcmed\Entity\TipoLogradouro
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * 
     * @param string $status
     * @return \Tcmed\Entity\TipoLogradouro
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }


    
}

