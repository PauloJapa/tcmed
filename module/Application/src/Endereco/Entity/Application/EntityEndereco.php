<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityEndereco
 *
 * @ORM\Table(name="endereco", indexes={@ORM\Index(name="bairro_codigo", columns={"bairro_codigo"})})
 * @ORM\Entity
 */
class EntityEndereco
{
    /**
     * @var integer
     *
     * @ORM\Column(name="endereco_codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $enderecoCodigo = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="bairro_codigo", type="integer", nullable=true)
     */
    private $bairroCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco_cep", type="string", length=9, nullable=true)
     */
    private $enderecoCep;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco_logradouro", type="string", length=72, nullable=true)
     */
    private $enderecoLogradouro;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco_complemento", type="string", length=72, nullable=true)
     */
    private $enderecoComplemento;


}

