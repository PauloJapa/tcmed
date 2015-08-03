<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTeste
 *
 * @ORM\Table(name="teste")
 * @ORM\Entity
 */
class EntityTeste
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_teste", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTeste;

    /**
     * @var string
     *
     * @ORM\Column(name="campo1", type="string", length=100, nullable=false)
     */
    private $campo1;

    /**
     * @var string
     *
     * @ORM\Column(name="campo2", type="string", length=100, nullable=false)
     */
    private $campo2;

    /**
     * @var string
     *
     * @ORM\Column(name="campo3", type="string", length=100, nullable=false)
     */
    private $campo3;


}

