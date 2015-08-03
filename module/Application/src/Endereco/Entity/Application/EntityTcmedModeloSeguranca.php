<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedModeloSeguranca
 *
 * @ORM\Table(name="tcmed_modelo_seguranca", indexes={@ORM\Index(name="fk_modeloSeguranca_funcao_risco1_idx", columns={"funcao_risco_id_funcao_risco"}), @ORM\Index(name="fk_modeloSeguranca_funcao_epi1_idx", columns={"funcao_epi_id_funcao_epi"}), @ORM\Index(name="fk_modeloSeguranca_funcao_epc1_idx", columns={"funcao_epc_id_funcao_epc"})})
 * @ORM\Entity
 */
class EntityTcmedModeloSeguranca
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_modeloSeguranca", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModeloseguranca;

    /**
     * @var \Application\EntityTcmedFuncaoEpc
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedFuncaoEpc")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcao_epc_id_funcao_epc", referencedColumnName="id_funcao_epc")
     * })
     */
    private $funcaoEpcFuncaoEpc;

    /**
     * @var \Application\EntityTcmedFuncaoEpi
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedFuncaoEpi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcao_epi_id_funcao_epi", referencedColumnName="id_funcao_epi")
     * })
     */
    private $funcaoEpiFuncaoEpi;

    /**
     * @var \Application\EntityTcmedFuncaoRisco
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedFuncaoRisco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcao_risco_id_funcao_risco", referencedColumnName="id_funcao_risco")
     * })
     */
    private $funcaoRiscoFuncaoRisco;


}

