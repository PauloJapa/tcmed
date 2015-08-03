<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedFuncaoEpc
 *
 * @ORM\Table(name="tcmed_funcao_epc", indexes={@ORM\Index(name="fk_funcao_epc_epc1_idx", columns={"epc_id_epc"})})
 * @ORM\Entity
 */
class EntityTcmedFuncaoEpc
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_funcao_epc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFuncaoEpc;

    /**
     * @var \Application\EntityTcmedEpc
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedEpc")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="epc_id_epc", referencedColumnName="id_epc")
     * })
     */
    private $epcEpc;


}

