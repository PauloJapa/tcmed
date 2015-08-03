<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityUf
 *
 * @ORM\Table(name="uf")
 * @ORM\Entity
 */
class EntityUf
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="uf_codigo", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ufCodigo = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="uf_sigla", type="string", length=2, nullable=true)
     */
    private $ufSigla;

    /**
     * @var string
     *
     * @ORM\Column(name="uf_descricao", type="string", length=72, nullable=true)
     */
    private $ufDescricao;


}

