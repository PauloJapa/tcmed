<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Entity\AbstractEntity;
/**
 * Pergunta
 *
 * @ORM\Table(name="tcmed_pergunta")
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\PerguntaRepository")
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
    
    /**
     * 
     * @return integer
     */
    public function getIdPergunta() {
        return $this->idPergunta;
    }

    /**
     * 
     * @return string
     */
    public function getPergunta() {
        return $this->pergunta;
    }

    /**
     * 
     * @return string
     */
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
    
    /**
     * 
     * @param integer $idPergunta
     */
    public function setIdPergunta($idPergunta) {
        $this->idPergunta = $idPergunta;
    }

    /**
     * 
     * @param string $pergunta
     */
    public function setPergunta($pergunta) {
        $this->pergunta = $pergunta;
    }

    /**
     * 
     * @param string $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }


}

