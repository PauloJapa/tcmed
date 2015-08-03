<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedPergunta
 *
 * @ORM\Table(name="tcmed_pergunta")
 * @ORM\Entity
 */
class EntityTcmedPergunta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_pergunta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPergunta;

    /**
     * @var string
     *
     * @ORM\Column(name="pergunta", type="string", length=150, nullable=true)
     */
    private $pergunta;

    /**
     * @var string
     *
     * @ORM\Column(name="resposta", type="string", length=150, nullable=true)
     */
    private $resposta;

    /**
     * @var string
     *
     * @ORM\Column(name="check_resposta", type="string", length=5, nullable=true)
     */
    private $checkResposta;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';


}

