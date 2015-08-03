<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedAdministradora
 *
 * @ORM\Table(name="tcmed_administradora", indexes={@ORM\Index(name="fk_administradora_hold1_idx", columns={"hold_id"}), @ORM\Index(name="fk_administradora_contato1_idx", columns={"contato_id"}), @ORM\Index(name="fk_tcmed_administradora_tcmed_hold1_idx", columns={"hold_virtual"}), @ORM\Index(name="index5", columns={"referencia_tcmed"}), @ORM\Index(name="fk_tcmed_administradora_tcmed_endereco1_idx", columns={"endereco_id"})})
 * @ORM\Entity
 */
class EntityTcmedAdministradora
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_administradora", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAdministradora;

    /**
     * @var string
     *
     * @ORM\Column(name="razao_social", type="string", length=100, nullable=false)
     */
    private $razaoSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="fantasia_administradora", type="string", length=70, nullable=true)
     */
    private $fantasiaAdministradora;

    /**
     * @var string
     *
     * @ORM\Column(name="cnpj", type="string", length=20, nullable=false)
     */
    private $cnpj;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';

    /**
     * @var string
     *
     * @ORM\Column(name="referencia", type="string", length=45, nullable=true)
     */
    private $referencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="referencia_tcmed", type="integer", nullable=false)
     */
    private $referenciaTcmed;

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
     * @var \Application\EntityTcmedHold
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedHold")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hold_id", referencedColumnName="id_hold")
     * })
     */
    private $hold;

    /**
     * @var \Application\EntityTcmedEndereco
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedEndereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="endereco_id", referencedColumnName="id_endereco")
     * })
     */
    private $endereco;

    /**
     * @var \Application\EntityTcmedHold
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedHold")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hold_virtual", referencedColumnName="id_hold")
     * })
     */
    private $holdVirtual;


}

