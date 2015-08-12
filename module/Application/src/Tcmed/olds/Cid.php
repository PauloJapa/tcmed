<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cid
 *
 * @ORM\Table(name="tcmed_cid")
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\CidRepository")
 * @author Allan Davini
 */
class Cid extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @author Allan Davini
     */
    private $idCid;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao_cid", type="string", length=100, nullable=false)
     * @author Allan Davini
     */
    private $descricaoCid;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_cid", type="string", length=45, nullable=false)
     * @author Allan Davini
     */
    private $numeroCid;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     * @author Allan Davini
     */
    private $status = 'ativo';
    
    /**
     * 
     * @return String
     */
    public function getId() {
        return $this->getIdCid();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdCid($id);
    }


    /**
     * 
     * @return integer
     */
    public function getIdCid() {
        return $this->idCid;
    }

    /**
     * 
     * @return string
     */
    public function getDescricaoCid() {
        return $this->descricaoCid;
    }

    /**
     * 
     * @return string
     */
    public function getNumeroCid() {
        return $this->numeroCid;
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
     * @param integer $idCid
     * @return \Tcmed\Entity\Cid
     */
    public function setIdCid($idCid) {
        $this->idCid = $idCid;
        return $this;
    }

    /**
     * 
     * @param string $descricaoCid
     * @return \Tcmed\Entity\Cid
     */
    public function setDescricaoCid($descricaoCid) {
        $this->descricaoCid = $descricaoCid;
        return $this;
    }

    /**
     * 
     * @param string $numeroCid
     * @return \Tcmed\Entity\Cid
     */
    public function setNumeroCid($numeroCid) {
        $this->numeroCid = $numeroCid;
        return $this;
    }

    /**
     * 
     * @param string $status
     * @return \Tcmed\Entity\Cid
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }



}

