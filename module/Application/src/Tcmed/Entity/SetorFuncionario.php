<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SetorFuncionario
 *
 * @ORM\Table(name="tcmed_setor_funcionario", indexes={@ORM\Index(name="fk_setor_funcionario_setor1_idx", columns={"setor_id_setor"}), @ORM\Index(name="fk_setor_funcionario_funcionario1_idx", columns={"funcionario_id_funcionario"})})
 * @ORM\Entity(repositoryClass="\modulo\Entity\Repository\SetorFuncionarioRepository")
 * @author Allan Davini
 */
class SetorFuncionario extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_setor_funcionario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSetorFuncionario;

    /**
     * @var integer
     *
     * @ORM\Column(name="funcionario_id_funcionario", type="integer", nullable=false)
     */
    private $funcionarioIdFuncionario;

    /**
     * @var \Tcmed\Entity\Setor
     *
     * @ORM\ManyToOne(targetEntity="Setor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="setor_id_setor", referencedColumnName="id_setor")
     * })
     */
    private $setorSetor;

    /**
     * Metodo padrão para o campo key da tabela
     * @return string
     */
    public function getId() {
        return $this->getIdSetorFuncionario();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdSetorFuncionario($id);
    }

    /**
     * 
     * @return integer
     */
    function getIdSetorFuncionario() {
        return $this->idSetorFuncionario;
    }

    /**
     * 
     * @return integer
     */
    function getFuncionarioIdFuncionario() {
        return $this->funcionarioIdFuncionario;
    }

    /**
     * 
     * @return integer
     */
    function getSetorSetor() {
        return $this->setorSetor;
    }

    /**
     * 
     * @param integer $idSetorFuncionario
     */
    function setIdSetorFuncionario($idSetorFuncionario) {
        $this->idSetorFuncionario = $idSetorFuncionario;
    }

    /**
     * 
     * @param integer $funcionarioIdFuncionario
     */
    function setFuncionarioIdFuncionario($funcionarioIdFuncionario) {
        $this->funcionarioIdFuncionario = $funcionarioIdFuncionario;
    }

    /**
     * 
     * @param \Tcmed\Entity\Setor $setorSetor
     */
    function setSetorSetor(\Tcmed\Entity\Setor $setorSetor) {
        $this->setorSetor = $setorSetor;
    }


}

