<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedSetorFuncionario
 *
 * @ORM\Table(name="tcmed_setor_funcionario", indexes={@ORM\Index(name="fk_setor_funcionario_setor1_idx", columns={"setor_id_setor"}), @ORM\Index(name="fk_setor_funcionario_funcionario1_idx", columns={"funcionario_id_funcionario"})})
 * @ORM\Entity
 */
class EntityTcmedSetorFuncionario
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
     * @var \Application\EntityTcmedFuncionario
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedFuncionario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcionario_id_funcionario", referencedColumnName="id_funcionario")
     * })
     */
    private $funcionarioFuncionario;

    /**
     * @var \Application\EntityTcmedSetor
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedSetor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="setor_id_setor", referencedColumnName="id_setor")
     * })
     */
    private $setorSetor;


}

