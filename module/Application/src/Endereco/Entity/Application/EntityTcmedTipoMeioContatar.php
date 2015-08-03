<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedTipoMeioContatar
 *
 * @ORM\Table(name="tcmed_tipo_meio_contatar")
 * @ORM\Entity
 */
class EntityTcmedTipoMeioContatar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipo_meio_contatar", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipoMeioContatar;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=145, nullable=false)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="mascara", type="string", length=145, nullable=true)
     */
    private $mascara;

    /**
     * @var string
     *
     * @ORM\Column(name="mascara_aux", type="string", length=145, nullable=true)
     */
    private $mascaraAux;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=true)
     */
    private $status = 'A';


}

