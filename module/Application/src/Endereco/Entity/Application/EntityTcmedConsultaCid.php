<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedConsultaCid
 *
 * @ORM\Table(name="tcmed_consulta_cid", indexes={@ORM\Index(name="fk_consulta_cid_cid1_idx", columns={"cid_id_cid"}), @ORM\Index(name="fk_consulta_cid_consulta1_idx", columns={"consulta_id_consulta"})})
 * @ORM\Entity
 */
class EntityTcmedConsultaCid
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_consulta_cid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idConsultaCid;

    /**
     * @var \Application\EntityTcmedCid
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedCid")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cid_id_cid", referencedColumnName="id_cid")
     * })
     */
    private $cidCid;

    /**
     * @var \Application\EntityTcmedConsulta
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedConsulta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="consulta_id_consulta", referencedColumnName="id_consulta")
     * })
     */
    private $consultaConsulta;


}

