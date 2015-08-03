<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedEpc
 *
 * @ORM\Table(name="tcmed_epc")
 * @ORM\Entity
 */
class EntityTcmedEpc
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_epc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEpc;

    /**
     * @var string
     *
     * @ORM\Column(name="epc", type="string", length=200, nullable=false)
     */
    private $epc;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="date", nullable=false)
     */
    private $dtCadastro;


}

