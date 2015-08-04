<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Epi
 *
 * @ORM\Table(name="tcmed_epi")
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\EpiRepository")
 * @author Danilo Dorotheu
 */
class Epi extends \Application\Entity\AbstractEntity{

    /**
     * @var integer
     *
     * @ORM\Column(name="id_epi", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEpi;

    /**
     * @var string
     *
     * @ORM\Column(name="epi", type="string", length=200, nullable=false)
     */
    private $epi;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="date", nullable=false)
     */
    private $dtCadastro;

    public function __construct(array $options = array()) {
        parent::__construct($options);
        $this->dtCadastro = new \DateTime("now");
    }

    /**
     * Alias getIdEpi
     * @return integer
     */
    public function getId() {
        return $this->getIdEpi();
    }
    
    public function getIdEpi() {
        return $this->idEpi;
    }

    public function getEpi() {
        return $this->epi;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getDtCadastro($obj = FALSE, $full = FALSE) {
        return $this->strToDate($this->dtCadastro, $obj, $full);
    }
    /**
     * Alias setIdEpi
     * @param integer $idEpi
     */
    public function setId($idEpi) {
        $this->setIdEpi($idEpi);
    }

    public function setIdEpi($idEpi) {
        $this->idEpi = $idEpi;
    }

    public function setEpi($epi) {
        $this->epi = $epi;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setDtCadastro($dtCadastro) {
        $this->dtCadastro = $this->strToDate($dtCadastro);
    }
}
