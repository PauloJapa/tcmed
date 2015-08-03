<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedRisco
 *
 * @ORM\Table(name="tcmed_risco")
 * @ORM\Entity
 */
class EntityTcmedRisco
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_risco", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRisco;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=60, nullable=true)
     */
    private $descricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_inclusao", type="date", nullable=true)
     */
    private $dtInclusao;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=true)
     */
    private $status;


}

