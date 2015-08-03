<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedFuncionario
 *
 * @ORM\Table(name="tcmed_funcionario", indexes={@ORM\Index(name="fk_funcionario_endereco1_idx", columns={"endereco_id"}), @ORM\Index(name="fk_funcionario_empresa1_idx", columns={"empresa_id"})})
 * @ORM\Entity
 */
class EntityTcmedFuncionario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_funcionario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFuncionario;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_funcionario", type="string", length=100, nullable=false)
     */
    private $nomeFuncionario;

    /**
     * @var string
     *
     * @ORM\Column(name="rg", type="string", length=20, nullable=false)
     */
    private $rg;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=20, nullable=false)
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=12, nullable=true)
     */
    private $sexo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_admissao", type="date", nullable=true)
     */
    private $dtAdmissao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_demissao", type="date", nullable=true)
     */
    private $dtDemissao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_cad", type="date", nullable=false)
     */
    private $dataCad;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_civil", type="string", length=14, nullable=true)
     */
    private $estadoCivil;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_nascimento", type="date", nullable=true)
     */
    private $dtNascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'A';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="createBy", type="integer", nullable=true)
     */
    private $createby;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="updateBy", type="integer", nullable=true)
     */
    private $updateby;

    /**
     * @var \Application\EntityTcmedEmpresa
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedEmpresa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empresa_id", referencedColumnName="id_empresa")
     * })
     */
    private $empresa;

    /**
     * @var \Application\EntityTcmedEndereco
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedEndereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="endereco_id", referencedColumnName="id_endereco")
     * })
     */
    private $endereco;


}

