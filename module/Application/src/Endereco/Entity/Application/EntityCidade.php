<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityCidade
 *
 * @ORM\Table(name="cidade", indexes={@ORM\Index(name="uf_codigo", columns={"uf_codigo"})})
 * @ORM\Entity
 */
class EntityCidade
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cidade_codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cidadeCodigo = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="uf_codigo", type="integer", nullable=true)
     */
    private $ufCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="cidade_descricao", type="string", length=72, nullable=true)
     */
    private $cidadeDescricao;

    /**
     * @var string
     *
     * @ORM\Column(name="cidade_cep", type="string", length=8, nullable=true)
     */
    private $cidadeCep;


}

