<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedHold
 *
 * @ORM\Table(name="tcmed_hold", indexes={@ORM\Index(name="fk_hold_contato1_idx", columns={"contato_id_contato"}), @ORM\Index(name="ref_adm", columns={"referencia_adm"}), @ORM\Index(name="index4", columns={"referencia_tcmed"}), @ORM\Index(name="fk_tcmed_hold_tcmed_endereco1_idx", columns={"endereco_id"})})
 * @ORM\Entity
 */
class EntityTcmedHold
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_hold", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHold;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_hold", type="string", length=100, nullable=false)
     */
    private $nomeHold;

    /**
     * @var string
     *
     * @ORM\Column(name="fantasia_hold", type="string", length=70, nullable=true)
     */
    private $fantasiaHold;

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
     * @ORM\Column(name="referencia_hold", type="string", length=45, nullable=true)
     */
    private $referenciaHold;

    /**
     * @var integer
     *
     * @ORM\Column(name="referencia_tcmed", type="integer", nullable=true)
     */
    private $referenciaTcmed;

    /**
     * @var string
     *
     * @ORM\Column(name="referencia_adm", type="string", length=15, nullable=true)
     */
    private $referenciaAdm;

    /**
     * @var \Application\EntityTcmedContato
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedContato")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contato_id_contato", referencedColumnName="id_contato")
     * })
     */
    private $contatoContato;

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

