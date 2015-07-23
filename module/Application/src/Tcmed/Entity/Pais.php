<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pais
 *
 * @ORM\Table(name="tcmed_pais")
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\PaisRepository")
 */
class Pais extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_pais", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPais;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_pais", type="string", length=45, nullable=false)
     */
    private $nomePais;

    /**
     * @var string
     *
     * @ORM\Column(name="sigla", type="string", length=3, nullable=false)
     */
    private $sigla;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=45, nullable=false)
     */
    private $codigo;

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
        return $this->getIdPais();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdPais($id);
    }

    /**
     * 
     * @return integer
     */
    public function getIdPais() {
        return $this->idPais;
    }

    /**
     * 
     * @return string
     */
    public function getNomePais() {
        return $this->nomePais;
    }

    /**
     * 
     * @return string
     */
    public function getSigla() {
        return $this->sigla;
    }

    /**
     * 
     * @return string
     */
    public function getCodigo() {
        return $this->codigo;
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
     * @param integer $idPais
     * @return \Tcmed\Entity\TcmedPais
     */
    public function setIdPais($idPais) {
        $this->idPais = $idPais;
        return $this;
    }

    /**
     * 
     * @param string $nomePais
     * @return \Tcmed\Entity\TcmedPais
     */
    public function setNomePais($nomePais) {
        $this->nomePais = $nomePais;
        return $this;
    }

    /**
     * 
     * @param string $sigla
     * @return \Tcmed\Entity\TcmedPais
     */
    public function setSigla($sigla) {
        $this->sigla = $sigla;
        return $this;
    }

    /**
     * 
     * @param string $codigo
     * @return \Tcmed\Entity\TcmedPais
     */
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
        return $this;
    }

    /**
     * 
     * @param string $status
     * @return \Tcmed\Entity\TcmedPais
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }



}

