<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Epc
 *
 * @ORM\Table(name="tcmed_epc")
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\EpcRepository")
 * @author Allan Davini
 */
class Epc extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_epc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEpc;

    /**
     * @var string
     *
     * @ORM\Column(name="epc", type="string", length=200, nullable=false)
     */
    private $epc;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';

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
     * 
     * @return String
     */
    public function getId() {
        return $this->getIdEpc();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdEpc($id);
    }

    /**
     * 
     * @return integer
     */
    function getIdEpc() {
        return $this->idEpc;
    }

    /**
     * 
     * @return string
     */
    function getEpc() {
        return $this->epc;
    }

    /**
     * 
     * @return string
     */
    function getStatus() {
        return $this->status;
    }

    /**
     * 
     * @return string
     */
    function getDtCadastro() {
        return $this->dateToStr($this->dtCadastro, $full, $obj);
    }

    /**
     * 
     * @param integer $idEpc
     */
    function setIdEpc($idEpc) {
        $this->idEpc = $idEpc;
    }

    /**
     * 
     * @param string $epc
     */
    function setEpc($epc) {
        $this->epc = $epc;
    }

    /**
     * 
     * @param string $status
     */
    function setStatus($status) {
        $this->status = $status;
    }

    /**
     * 
     * @param \DateTime $dtCadastro
     */
    function setDtCadastro(\DateTime $dtCadastro) {
        $this->dtCadastro = $this->strToDate($dtCadastro);
    }


    
}

