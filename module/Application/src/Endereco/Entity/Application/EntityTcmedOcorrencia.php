<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedOcorrencia
 *
 * @ORM\Table(name="tcmed_ocorrencia", indexes={@ORM\Index(name="fk_ocorrencia_empresa1_idx", columns={"empresa_id_empresa"}), @ORM\Index(name="fk_ocorrencia_hold1_idx", columns={"hold_id_hold"}), @ORM\Index(name="fk_ocorrencia_administradora1_idx", columns={"administradora_id_administradora"}), @ORM\Index(name="fk_tcmed_ocorrencia_usuario1_idx", columns={"usuario_id_usuario"})})
 * @ORM\Entity
 */
class EntityTcmedOcorrencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_ocorrencia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOcorrencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_ocorrencia", type="datetime", nullable=false)
     */
    private $dtOcorrencia;

    /**
     * @var string
     *
     * @ORM\Column(name="assunto", type="text", length=65535, nullable=false)
     */
    private $assunto;

    /**
     * @var integer
     *
     * @ORM\Column(name="funcionario_ocorrencia_id_funcionario_ocorr", type="integer", nullable=true)
     */
    private $funcionarioOcorrenciaIdFuncionarioOcorr;

    /**
     * @var \Application\EntityTcmedAdministradora
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedAdministradora")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="administradora_id_administradora", referencedColumnName="id_administradora")
     * })
     */
    private $administradoraAdministradora;

    /**
     * @var \Application\EntityTcmedEmpresa
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedEmpresa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empresa_id_empresa", referencedColumnName="id_empresa")
     * })
     */
    private $empresaEmpresa;

    /**
     * @var \Application\EntityTcmedHold
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedHold")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hold_id_hold", referencedColumnName="id_hold")
     * })
     */
    private $holdHold;

    /**
     * @var \Application\EntityUsuario
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id_usuario", referencedColumnName="id_usuario")
     * })
     */
    private $usuarioUsuario;


}

