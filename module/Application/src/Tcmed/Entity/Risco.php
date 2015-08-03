<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Risco
 *
 * @ORM\Table(name="tcmed_risco")
 * @ORM\Entity(repositoryClass="\modulo\Entity\Repository\RiscoRepository")
 */
class Risco extends \Application\Entity\AbstractEntity {

    /**
     * @var integer
     *
     * @ORM\Column(name="id_risco", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRisco;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=60, nullable=true)
     */
    private $descricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_inclusao", type="date", nullable=true)
     */
    private $dtInclusao;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=true)
     */
    private $status;

    /**
     * Alias de acesso para getIdRisco
     * @return integer
     * @author Danilo Dorotheu
     */
    function getId() {
        return $this->getIdRisco();
    }

    /**
     * Alias para setIdRisco
     * @param integer $idRisco
     * @author Danilo Dorotheu
     */
    function setId($idRisco) {
        $this->setIdRisco($idRisco);
    }

    function getIdRisco() {
        return $this->idRisco;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getDtInclusao() {
        return $this->dtInclusao;
    }

    function getStatus() {
        return $this->status;
    }

    function setIdRisco($idRisco) {
        $this->idRisco = $idRisco;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setDtInclusao(\DateTime $dtInclusao) {
        $this->dtInclusao = $dtInclusao;
    }

    function setStatus($status) {
        $this->status = $status;
    }

}
