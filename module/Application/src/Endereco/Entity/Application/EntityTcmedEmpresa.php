<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedEmpresa
 *
 * @ORM\Table(name="tcmed_empresa", indexes={@ORM\Index(name="fk_empresa_administradora1_idx", columns={"administradora_id"}), @ORM\Index(name="fk_empresa_contato1_idx", columns={"contato_id"}), @ORM\Index(name="fk_tcmed_empresa_tcmed_endereco1_idx", columns={"endereco_id"})})
 * @ORM\Entity
 */
class EntityTcmedEmpresa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_empresa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEmpresa;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_empresa", type="string", length=100, nullable=false)
     */
    private $nomeEmpresa;

    /**
     * @var string
     *
     * @ORM\Column(name="fantasia_empresa", type="string", length=70, nullable=true)
     */
    private $fantasiaEmpresa;

    /**
     * @var string
     *
     * @ORM\Column(name="cnpj", type="string", length=16, nullable=false)
     */
    private $cnpj;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="date", nullable=false)
     */
    private $dtCadastro;

    /**
     * @var integer
     *
     * @ORM\Column(name="qtd_func", type="integer", nullable=true)
     */
    private $qtdFunc;

    /**
     * @var string
     *
     * @ORM\Column(name="refencia_administradora", type="string", length=40, nullable=true)
     */
    private $refenciaAdministradora;

    /**
     * @var string
     *
     * @ORM\Column(name="referencia_vila_velha", type="string", length=40, nullable=true)
     */
    private $referenciaVilaVelha;

    /**
     * @var integer
     *
     * @ORM\Column(name="hold_virtual", type="integer", nullable=true)
     */
    private $holdVirtual;

    /**
     * @var string
     *
     * @ORM\Column(name="inscricao_estadual", type="string", length=45, nullable=true)
     */
    private $inscricaoEstadual;

    /**
     * @var string
     *
     * @ORM\Column(name="guia_avulsa", type="string", length=1, nullable=true)
     */
    private $guiaAvulsa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \Application\EntityTcmedAdministradora
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedAdministradora")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="administradora_id", referencedColumnName="id_administradora")
     * })
     */
    private $administradora;

    /**
     * @var \Application\EntityTcmedContato
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedContato")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contato_id", referencedColumnName="id_contato")
     * })
     */
    private $contato;

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

