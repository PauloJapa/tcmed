<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityPaises
 *
 * @ORM\Table(name="paises")
 * @ORM\Entity
 */
class EntityPaises
{
    /**
     * @var string
     *
     * @ORM\Column(name="iso", type="string", length=2, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iso;

    /**
     * @var string
     *
     * @ORM\Column(name="iso3", type="string", length=3, nullable=false)
     */
    private $iso3;

    /**
     * @var integer
     *
     * @ORM\Column(name="numcode", type="smallint", nullable=true)
     */
    private $numcode;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;


}

