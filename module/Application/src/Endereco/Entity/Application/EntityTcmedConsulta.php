<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedConsulta
 *
 * @ORM\Table(name="tcmed_consulta", indexes={@ORM\Index(name="fk_consulta_clinica1_idx", columns={"clinica_id_clinica"}), @ORM\Index(name="fk_consulta_medico2_idx", columns={"medico_id_medico"}), @ORM\Index(name="fk_consulta_funcionario2_idx", columns={"funcionario_id_funcionario"}), @ORM\Index(name="fk_consulta_cargo1_idx", columns={"cargo_id_cargo"}), @ORM\Index(name="fk_consulta_setor1_idx", columns={"setor_id_setor"})})
 * @ORM\Entity
 */
class EntityTcmedConsulta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_consulta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idConsulta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_consulta", type="date", nullable=true)
     */
    private $dtConsulta;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';

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
     * @var \Application\EntityTcmedClinica
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedClinica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clinica_id_clinica", referencedColumnName="id_clinica")
     * })
     */
    private $clinicaClinica;

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
     * @var \Application\EntityTcmedMedico
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedMedico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="medico_id_medico", referencedColumnName="id_medico")
     * })
     */
    private $medicoMedico;

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

