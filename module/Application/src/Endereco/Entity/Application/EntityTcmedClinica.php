<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedClinica
 *
 * @ORM\Table(name="tcmed_clinica", indexes={@ORM\Index(name="fk_clinica_contato1_idx", columns={"contato_id"}), @ORM\Index(name="fk_tcmed_clinica_tcmed_endereco1_idx", columns={"endereco_id"})})
 * @ORM\Entity
 */
class EntityTcmedClinica
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_clinica", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idClinica;

    /**
     * @var string
     *
     * @ORM\Column(name="razao_social", type="string", length=100, nullable=false)
     */
    private $razaoSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="fantasia_clinica", type="string", length=70, nullable=true)
     */
    private $fantasiaClinica;

    /**
     * @var string
     *
     * @ORM\Column(name="cnpj", type="string", length=16, nullable=false)
     */
    private $cnpj;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status;

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

