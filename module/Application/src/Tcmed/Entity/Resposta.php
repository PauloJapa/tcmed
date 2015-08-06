<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resposta
 *
 * @ORM\Table(name="tcmed_resposta", indexes={@ORM\Index(name="fk_tcmed_resposta_tcmed_pergunta1_idx", columns={"tcmed_pergunta_id"}), @ORM\Index(name="fk_tcmed_resposta_tcmed_consulta1_idx", columns={"tcmed_consulta_id_consulta"})})
 * @ORM\Entity(repositoryClass="\modulo\Entity\Repository\RiscoRepository")
 * @author Allan Davini
 */
class Resposta extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_resposta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idResposta;

    /**
     * @var string
     *
     * @ORM\Column(name="resposta", type="text", length=65535, nullable=true)
     */
    private $resposta;

    /**
     * @var string
     *
     * @ORM\Column(name="resposta_check", type="string", length=1, nullable=true)
     */
    private $respostaCheck = '0';

    /**
     * @var \Pergunta
     *
     * @ORM\ManyToOne(targetEntity="Pergunta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tcmed_pergunta_id", referencedColumnName="id_pergunta")
     * })
     */
    private $Pergunta;

    /**
     * @var \Consulta
     *
     * @ORM\ManyToOne(targetEntity="Consulta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tcmed_consulta_id_consulta", referencedColumnName="id_consulta")
     * })
     */
    private $consultaConsulta;
    
    /**
     * Alias de acesso para getIdRisco
     * @return integer
     */
    function getId() {
        return $this->getIdResposta();
    }

    /**
     * Alias para setIdRisco
     * @param integer $idRisco
     */
    function setId($idResposta) {
        $this->setIdResposta($idResposta);
    }
    
    /**
     * 
     * @return integer
     */
    function getIdResposta() {
        return $this->idResposta;
    }

    /**
     * 
     * @return string
     */
    function getResposta() {
        return $this->resposta;
    }

    /**
     * 
     * @return string
     */
    function getRespostaCheck() {
        return $this->respostaCheck;
    }

    /**
     * 
     * @return string
     */
    function getPergunta() {
        return $this->tcmedPergunta;
    }

    /**
     * 
     * @return string
     */
    function getConsultaConsulta() {
        return $this->tcmedConsultaConsulta;
    }

    /**
     * 
     * @param integer $idResposta
     */
    function setIdResposta($idResposta) {
        $this->idResposta = $idResposta;
    }

    /**
     * 
     * @param string $resposta
     */
    function setResposta($resposta) {
        $this->resposta = $resposta;
    }

    /**
     * 
     * @param string $respostaCheck
     */
    function setRespostaCheck($respostaCheck) {
        $this->respostaCheck = $respostaCheck;
    }

    /**
     * 
     * @param \Tcmed\Entity\Pergunta $Pergunta
     */
    function setPergunta(\Tcmed\Entity\Pergunta $Pergunta) {
        $this->Pergunta = $Pergunta;
    }

    /**
     * 
     * @param \Tcmed\Entity\Consulta $consultaConsulta
     */
    function setConsultaConsulta(\Tcmed\Entity\Consulta $consultaConsulta) {
        $this->ConsultaConsulta = $consultaConsulta;
    }




}

