<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedTipoMeioContatar
 *
 * @ORM\Table(name="tcmed_tipo_meio_contatar")
 * @ORM\Entity(repositoryClass="\modulo\Entity\Repository\TipoMeioContatarRepository")
 */
class TipoMeioContatar extends \Application\Entity\AbstractEntity {

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipo_meio_contatar", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipoMeioContatar;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=145, nullable=false)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="mascara", type="string", length=145, nullable=true)
     */
    private $mascara;

    /**
     * @var string
     *
     * @ORM\Column(name="mascara_aux", type="string", length=145, nullable=true)
     */
    private $mascaraAux;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=true)
     */
    private $status = 'A';

    /**
     * Alias para recuperar ID da entidade
     * @return string
     * @author Danilo Dorotheu
     */
    function getId() {
        return $this->getIdTipoMeioContatar();
    }

    /**
     * Alias para setar ID da entidade
     * @param type $idTipoMeioContatar
     * @author Danilo Dorotheu
     */
    function setId($idTipoMeioContatar) {
        $this->setIdTipoMeioContatar($idTipoMeioContatar);
    }

    function getIdTipoMeioContatar() {
        return $this->idTipoMeioContatar;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getMascara() {
        return $this->mascara;
    }

    function getMascaraAux() {
        return $this->mascaraAux;
    }

    function getStatus() {
        return $this->status;
    }

    function setIdTipoMeioContatar($idTipoMeioContatar) {
        $this->idTipoMeioContatar = $idTipoMeioContatar;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setMascara($mascara) {
        $this->mascara = $mascara;
    }

    function setMascaraAux($mascaraAux) {
        $this->mascaraAux = $mascaraAux;
    }

    function setStatus($status) {
        $this->status = $status;
    }

}
