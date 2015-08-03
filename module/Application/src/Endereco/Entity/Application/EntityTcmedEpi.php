<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedEpi
 *
 * @ORM\Table(name="tcmed_epi")
 * @ORM\Entity
 */
class EntityTcmedEpi
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_epi", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEpi;

    /**
     * @var string
     *
     * @ORM\Column(name="epi", type="string", length=200, nullable=false)
     */
    private $epi;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="date", nullable=false)
     */
    private $dtCadastro;


}

