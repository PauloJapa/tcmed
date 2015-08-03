<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedEstado
 *
 * @ORM\Table(name="tcmed_estado", indexes={@ORM\Index(name="fk_estado_pais1_idx", columns={"pais_id"})})
 * @ORM\Entity
 */
class EntityTcmedEstado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_estado", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_estado", type="string", length=70, nullable=false)
     */
    private $nomeEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="uf", type="string", length=3, nullable=false)
     */
    private $uf;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=false)
     */
    private $status = 'A';

    /**
     * @var \Application\EntityTcmedPais
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedPais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais_id", referencedColumnName="id_pais")
     * })
     */
    private $pais;


}

