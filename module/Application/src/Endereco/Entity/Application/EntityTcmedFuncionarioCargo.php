<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedFuncionarioCargo
 *
 * @ORM\Table(name="tcmed_funcionario_cargo", indexes={@ORM\Index(name="fk_funcionario_cargo_funcionario1_idx", columns={"funcionario_id_funcionario"}), @ORM\Index(name="fk_funcionario_cargo_cargo1_idx", columns={"cargo_id_cargo"})})
 * @ORM\Entity
 */
class EntityTcmedFuncionarioCargo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_funcionario_cargo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFuncionarioCargo;

    /**
     * @var \Application\EntityTcmedCargo
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedCargo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cargo_id_cargo", referencedColumnName="id_cargo")
     * })
     */
    private $cargoCargo;

    /**
     * @var \Application\EntityTcmedFuncionario
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedFuncionario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcionario_id_funcionario", referencedColumnName="id_funcionario")
     * })
     */
    private $funcionarioFuncionario;


}

