<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedFuncaoRisco
 *
 * @ORM\Table(name="tcmed_funcao_risco", indexes={@ORM\Index(name="fk_funcao_risco_risco1_idx", columns={"risco_id_risco"})})
 * @ORM\Entity
 */
class EntityTcmedFuncaoRisco
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_funcao_risco", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFuncaoRisco;

    /**
     * @var \Application\EntityTcmedRisco
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedRisco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="risco_id_risco", referencedColumnName="id_risco")
     * })
     */
    private $riscoRisco;


}

