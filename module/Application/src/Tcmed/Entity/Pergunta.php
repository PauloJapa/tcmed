<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Entity\AbstractEntity;
/**
 * TcmedPergunta
 *
 * @ORM\Table(name="tcmed_pergunta")
 * @ORM\Entity(repositoryClass="\modulo\Entity\Repository\PerguntaRepository")
 * @author Danilo Dorotheu
 */
class Pergunta extends AbstractEntity
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

    /**
     * Alias getIdPergunta
     * @return integer
     */
    public function getId() {
        return $this->getIdPergunta();
    }
    
    public function getIdPergunta() {
        return $this->idPergunta;
    }

    public function getPergunta() {
        return $this->pergunta;
    }

    public function getResposta() {
        return $this->resposta;
    }

    public function getCheckResposta() {
        return $this->checkResposta;
    }

    public function getStatus() {
        return $this->status;
    }
    
    /**
     * Alias setIdPergunta
     * @param integer $idPergunta
     */
    public function setId($idPergunta) {
        $this->setIdPergunta($idPergunta);
    }
    
    public function setIdPergunta($idPergunta) {
        $this->idPergunta = $idPergunta;
    }

    public function setPergunta($pergunta) {
        $this->pergunta = $pergunta;
    }

    public function setResposta($resposta) {
        $this->resposta = $resposta;
    }

    public function setCheckResposta($checkResposta) {
        $this->checkResposta = $checkResposta;
    }

    public function setStatus($status) {
        $this->status = $status;
    }


}

