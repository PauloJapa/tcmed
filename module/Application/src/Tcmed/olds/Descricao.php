<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Descricao
 *
 * @ORM\Table(name="tcmed_descricao")
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\DescricaoRepository")
 */
class Descricao extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_descricao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDescricao;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=150, nullable=false)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=false)
     */
    private $status = 'ativo';
    
    /**
     * 
     * @return String
     */
    public function getId() {
        return $this->getIdDescricao();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdDescricao($id);
    }
    
    /**
     * 
     * @return integer
     */
    function getIdDescricao() {
        return $this->idDescricao;
    }

    /**
     * 
     * @return string
     */
    function getDescricao() {
        return $this->descricao;
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
     * @param integer $idDescricao
     */
    function setIdDescricao($idDescricao) {
        $this->idDescricao = $idDescricao;
    }

    /**
     * 
     * @param string $descricao
     */
    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    /**
     * 
     * @param string $status
     */
    function setStatus($status) {
        $this->status = $status;
    }




}

