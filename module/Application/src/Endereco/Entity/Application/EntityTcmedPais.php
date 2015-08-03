<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedPais
 *
 * @ORM\Table(name="tcmed_pais")
 * @ORM\Entity
 */
class EntityTcmedPais
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_pais", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPais;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_pais", type="string", length=45, nullable=false)
     */
    private $nomePais;

    /**
     * @var string
     *
     * @ORM\Column(name="sigla", type="string", length=3, nullable=false)
     */
    private $sigla;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=45, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'A';


}

