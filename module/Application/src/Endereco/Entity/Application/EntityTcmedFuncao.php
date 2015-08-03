<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedFuncao
 *
 * @ORM\Table(name="tcmed_funcao", indexes={@ORM\Index(name="fk_funcao_descricao1_idx", columns={"descricao_id_descricao"})})
 * @ORM\Entity
 */
class EntityTcmedFuncao
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_funcao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFuncao;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_funcao", type="string", length=70, nullable=false)
     */
    private $nomeFuncao;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';

    /**
     * @var string
     *
     * @ORM\Column(name="referencia", type="string", length=40, nullable=true)
     */
    private $referencia;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_funcao", type="string", length=45, nullable=true)
     */
    private $codFuncao;

    /**
     * @var \Application\EntityTcmedDescricao
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedDescricao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="descricao_id_descricao", referencedColumnName="id_descricao")
     * })
     */
    private $descricaoDescricao;


}

