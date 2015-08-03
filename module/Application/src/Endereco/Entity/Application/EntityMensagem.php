<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityMensagem
 *
 * @ORM\Table(name="mensagem")
 * @ORM\Entity
 */
class EntityMensagem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_mensagem", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMensagem;

    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="text", length=65535, nullable=true)
     */
    private $texto;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=150, nullable=true)
     */
    private $link;


}

