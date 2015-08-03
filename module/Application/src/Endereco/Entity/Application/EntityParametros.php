<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityParametros
 *
 * @ORM\Table(name="parametros")
 * @ORM\Entity
 */
class EntityParametros
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_parame", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idParame;

    /**
     * @var string
     *
     * @ORM\Column(name="chave", type="string", length=45, nullable=true)
     */
    private $chave;

    /**
     * @var string
     *
     * @ORM\Column(name="conteudo", type="string", length=45, nullable=true)
     */
    private $conteudo;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=45, nullable=true)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=true)
     */
    private $status;


}

