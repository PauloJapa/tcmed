<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedFuncaoEpi
 *
 * @ORM\Table(name="tcmed_funcao_epi", indexes={@ORM\Index(name="fk_funcao_epi_epi1_idx", columns={"epi_id_epi"})})
 * @ORM\Entity
 */
class EntityTcmedFuncaoEpi
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_funcao_epi", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFuncaoEpi;

    /**
     * @var \Application\EntityTcmedEpi
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedEpi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="epi_id_epi", referencedColumnName="id_epi")
     * })
     */
    private $epiEpi;


}

