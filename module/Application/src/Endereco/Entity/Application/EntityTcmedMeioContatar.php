<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedMeioContatar
 *
 * @ORM\Table(name="tcmed_meio_contatar", indexes={@ORM\Index(name="fk_detalheContato_contato1_idx", columns={"contato_id"}), @ORM\Index(name="fk_tcmed_meio_contatar_tcmed_tipo_meio_contatar1_idx", columns={"tipo_meio_contatar_id"}), @ORM\Index(name="fk_tcmed_meio_contatar_tcmed_funcionario1_idx", columns={"funcionario_id"})})
 * @ORM\Entity
 */
class EntityTcmedMeioContatar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_meio_contatar", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMeioContatar;

    /**
     * @var string
     *
     * @ORM\Column(name="meio_de_contatar", type="string", length=60, nullable=false)
     */
    private $meioDeContatar;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'A';

    /**
     * @var \Application\EntityTcmedContato
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedContato")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contato_id", referencedColumnName="id_contato")
     * })
     */
    private $contato;

    /**
     * @var \Application\EntityTcmedFuncionario
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedFuncionario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcionario_id", referencedColumnName="id_funcionario")
     * })
     */
    private $funcionario;

    /**
     * @var \Application\EntityTcmedTipoMeioContatar
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedTipoMeioContatar")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_meio_contatar_id", referencedColumnName="id_tipo_meio_contatar")
     * })
     */
    private $tipoMeioContatar;


}

