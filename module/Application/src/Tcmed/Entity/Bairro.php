<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bairro
 *
 * @ORM\Table(name="tcmed_bairro", indexes={@ORM\Index(name="fk_bairro_cidade1_idx", columns={"cidade_id_cidade"})})
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\BairroRepository")
 * @author Allan Davini
 */
class Bairro extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_bairro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBairro;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_bairro", type="string", length=100, nullable=false)
     */
    private $nomeBairro;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'A';

    /**
     * @var \Cidade
     *
     * @ORM\ManyToOne(targetEntity="Cidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cidade_id_cidade", referencedColumnName="id_cidade")
     * })
     */
    private $cidadeBairro;

    /**
     * 
     * @return String
     */
    public function getId() {
        return $this->getIdBairro();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdBairro($id);
    }
    
    /**
     * 
     * @return integer
     */
    public function getIdBairro() {
        return $this->idBairro;
    }

    /**
     * 
     * @return string
     */
    public function getNomeBairro() {
        return $this->nomeBairro;
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
    public function getCidadeBairro() {
        return $this->cidadeBairro;
    }

    /**
     * 
     * @param integer $idBairro
     * @return \Tcmed\Entity\Bairro
     */
    public function setIdBairro($idBairro) {
        $this->idBairro = $idBairro;
        return $this;
    }

    /**
     * 
     * @param string $nomeBairro
     * @return \Tcmed\Entity\Bairro
     */
    public function setNomeBairro($nomeBairro) {
        $this->nomeBairro = $nomeBairro;
        return $this;
    }

    /**
     * 
     * @param string $status
     * @return \Tcmed\Entity\Bairro
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    /**
     * 
     * @param \Tcmed\Entity\Cidade $cidadeBairro
     * @return \Tcmed\Entity\Bairro
     */
    public function setCidadeBairro(\Tcmed\Entity\Cidade $cidadeBairro) {
        $this->cidadeBairro = $cidadeBairro;
        return $this;
    }



}

