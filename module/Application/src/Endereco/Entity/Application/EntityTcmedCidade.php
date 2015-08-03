<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedCidade
 *
 * @ORM\Table(name="tcmed_cidade", indexes={@ORM\Index(name="fk_cidade_estado1_idx", columns={"estado_id_estado"})})
 * @ORM\Entity
 */
class EntityTcmedCidade
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cidade", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCidade;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_cidade", type="string", length=100, nullable=false)
     */
    private $nomeCidade;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'A';

    /**
     * @var \Application\EntityTcmedEstado
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedEstado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estado_id_estado", referencedColumnName="id_estado")
     * })
     */
    private $estadoEstado;


}

