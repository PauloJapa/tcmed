<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Entity\AbstractEntity;

/**
 * Setor
 *
 * @ORM\Table(name="tcmed_setor")
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\SetorRepository")
 * @name Danilo Dorotheu
 */
class Setor extends AbstractEntity {

    /**
     * @var integer
     *
     * @ORM\Column(name="id_setor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSetor;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_setor", type="string", length=45, nullable=false)
     */
    private $nomeSetor;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=false)
     */
    private $status = 'ativo';

    /**
     * Alias getIdSetor
     * @return integer
     */
    public function getId() {
        return $this->getIdSetor();
    }

    public function getIdSetor() {
        return $this->idSetor;
    }

    public function getNomeSetor() {
        return $this->nomeSetor;
    }

    public function getStatus() {
        return $this->status;
    }

    /**
     * Alias setIdSetor
     * @param integer $idSetor
     */
    public function setId($idSetor) {
        $this->setIdSetor($idSetor);
    }

    public function setIdSetor($idSetor) {
        $this->idSetor = $idSetor;
    }

    public function setNomeSetor($nomeSetor) {
        $this->nomeSetor = $nomeSetor;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}
