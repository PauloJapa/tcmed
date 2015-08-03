<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedMedico
 *
 * @ORM\Table(name="tcmed_medico", indexes={@ORM\Index(name="fk_medico_clinica1_idx", columns={"clinica_id"}), @ORM\Index(name="fk_medico_endereco1_idx", columns={"endereco_id"}), @ORM\Index(name="referencia", columns={"referencia"})})
 * @ORM\Entity
 */
class EntityTcmedMedico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_medico", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMedico;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_medico", type="string", length=100, nullable=false)
     */
    private $nomeMedico;

    /**
     * @var string
     *
     * @ORM\Column(name="crm", type="string", length=15, nullable=false)
     */
    private $crm;

    /**
     * @var string
     *
     * @ORM\Column(name="rg", type="string", length=15, nullable=false)
     */
    private $rg;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=15, nullable=false)
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="especialidade", type="string", length=45, nullable=true)
     */
    private $especialidade;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_admissao", type="date", nullable=true)
     */
    private $dataAdmissao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_demissao", type="date", nullable=true)
     */
    private $dataDemissao;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=12, nullable=true)
     */
    private $sexo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_civil", type="string", length=15, nullable=true)
     */
    private $estadoCivil;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=1, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="nivel_gerencia", type="string", length=1, nullable=true)
     */
    private $nivelGerencia;

    /**
     * @var string
     *
     * @ORM\Column(name="referencia", type="string", length=45, nullable=true)
     */
    private $referencia;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';

    /**
     * @var \Application\EntityTcmedClinica
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedClinica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clinica_id", referencedColumnName="id_clinica")
     * })
     */
    private $clinica;

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

