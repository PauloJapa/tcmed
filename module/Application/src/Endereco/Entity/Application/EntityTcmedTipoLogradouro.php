<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedTipoLogradouro
 *
 * @ORM\Table(name="tcmed_tipo_logradouro")
 * @ORM\Entity
 */
class EntityTcmedTipoLogradouro
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipoLogradouro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipologradouro;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=20, nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'A';


}

