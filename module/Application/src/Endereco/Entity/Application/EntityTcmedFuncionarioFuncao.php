<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedFuncionarioFuncao
 *
 * @ORM\Table(name="tcmed_funcionario_funcao", indexes={@ORM\Index(name="fk_funcionario_funcao_funcionario1_idx", columns={"funcionario_id_funcionario"}), @ORM\Index(name="fk_funcionario_funcao_funcao1_idx", columns={"funcao_id_funcao"}), @ORM\Index(name="fk_funcionario_funcao_cargo1_idx", columns={"cargo_id_cargo"})})
 * @ORM\Entity
 */
class EntityTcmedFuncionarioFuncao
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_funcionario_funcao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFuncionarioFuncao;

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
     * @var \Application\EntityTcmedFuncao
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedFuncao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcao_id_funcao", referencedColumnName="id_funcao")
     * })
     */
    private $funcaoFuncao;

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

