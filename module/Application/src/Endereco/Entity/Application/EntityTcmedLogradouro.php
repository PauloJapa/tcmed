<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedLogradouro
 *
 * @ORM\Table(name="tcmed_logradouro", indexes={@ORM\Index(name="fk_logradouro_bairro1_idx", columns={"bairro_id_bairro"}), @ORM\Index(name="fk_logradouro_tipoLogradouro1_idx", columns={"tipoLogradouro_id_tipoLogradouro"})})
 * @ORM\Entity
 */
class EntityTcmedLogradouro
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_logradouro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLogradouro;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_logradouro", type="string", length=60, nullable=false)
     */
    private $nomeLogradouro;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'A';

    /**
     * @var string
     *
     * @ORM\Column(name="cep", type="string", length=10, nullable=false)
     */
    private $cep;

    /**
     * @var \Application\EntityTcmedBairro
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedBairro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bairro_id_bairro", referencedColumnName="id_bairro")
     * })
     */
    private $bairroBairro;

    /**
     * @var \Application\EntityTcmedTipoLogradouro
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedTipoLogradouro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoLogradouro_id_tipoLogradouro", referencedColumnName="id_tipoLogradouro")
     * })
     */
    private $tipologradouroTipologradouro;


}

