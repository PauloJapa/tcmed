<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedContato
 *
 * @ORM\Table(name="tcmed_contato", indexes={@ORM\Index(name="fk_tcmed_contato_tcmed_endereco1_idx", columns={"endereco_id"})})
 * @ORM\Entity
 */
class EntityTcmedContato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_contato", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idContato;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_contato", type="string", length=70, nullable=false)
     */
    private $nomeContato;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';

    /**
     * @var string
     *
     * @ORM\Column(name="rg", type="string", length=20, nullable=true)
     */
    private $rg;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=20, nullable=true)
     */
    private $cpf;

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

