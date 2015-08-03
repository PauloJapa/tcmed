<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityTcmedQuestionario
 *
 * @ORM\Table(name="tcmed_questionario", indexes={@ORM\Index(name="fk_questionario_pergunta1_idx", columns={"pergunta_id_pergunta"}), @ORM\Index(name="fk_questionario_consulta1_idx", columns={"consulta_id_consulta"})})
 * @ORM\Entity
 */
class EntityTcmedQuestionario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_questionario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idQuestionario;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';

    /**
     * @var \Application\EntityTcmedConsulta
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedConsulta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="consulta_id_consulta", referencedColumnName="id_consulta")
     * })
     */
    private $consultaConsulta;

    /**
     * @var \Application\EntityTcmedPergunta
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityTcmedPergunta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pergunta_id_pergunta", referencedColumnName="id_pergunta")
     * })
     */
    private $perguntaPergunta;


}

