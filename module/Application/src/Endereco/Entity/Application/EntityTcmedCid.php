<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedCid
 *
 * @ORM\Table(name="tcmed_cid")
 * @ORM\Entity
 */
class EntityTcmedCid
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCid;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao_cid", type="string", length=100, nullable=false)
     */
    private $descricaoCid;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_cid", type="string", length=45, nullable=false)
     */
    private $numeroCid;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';


}

