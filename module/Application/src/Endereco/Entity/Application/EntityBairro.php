<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityBairro
 *
 * @ORM\Table(name="bairro", indexes={@ORM\Index(name="cidade_codigo", columns={"cidade_codigo"})})
 * @ORM\Entity
 */
class EntityBairro
{
    /**
     * @var integer
     *
     * @ORM\Column(name="bairro_codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bairroCodigo = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="cidade_codigo", type="integer", nullable=true)
     */
    private $cidadeCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="bairro_descricao", type="string", length=72, nullable=true)
     */
    private $bairroDescricao;


}

