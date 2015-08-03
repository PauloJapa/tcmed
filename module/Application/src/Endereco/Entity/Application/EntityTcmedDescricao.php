<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedDescricao
 *
 * @ORM\Table(name="tcmed_descricao")
 * @ORM\Entity
 */
class EntityTcmedDescricao
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_descricao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDescricao;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=150, nullable=false)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=false)
     */
    private $status = 'ativo';


}

