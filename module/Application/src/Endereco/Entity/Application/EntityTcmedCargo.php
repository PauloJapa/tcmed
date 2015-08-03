<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedCargo
 *
 * @ORM\Table(name="tcmed_cargo", indexes={@ORM\Index(name="fk_cargo_modeloSeguranca1_idx", columns={"modeloSeguranca_id_modeloSeguranca"}), @ORM\Index(name="fk_cargo_descricao1_idx", columns={"descricao_id_descricao"})})
 * @ORM\Entity
 */
class EntityTcmedCargo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cargo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCargo;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_cargo", type="string", length=45, nullable=true)
     */
    private $nomeCargo;

    /**
     * @var string
     *
     * @ORM\Column(name="cbo", type="string", length=45, nullable=true)
     */
    private $cbo;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="referencia", type="string", length=45, nullable=true)
     */
    private $referencia;

    /**
     * @var \Application\EntityTcmedDescricao
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedDescricao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="descricao_id_descricao", referencedColumnName="id_descricao")
     * })
     */
    private $descricaoDescricao;

    /**
     * @var \Application\EntityTcmedModeloSeguranca
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedModeloSeguranca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modeloSeguranca_id_modeloSeguranca", referencedColumnName="id_modeloSeguranca")
     * })
     */
    private $modelosegurancaModeloseguranca;


}

