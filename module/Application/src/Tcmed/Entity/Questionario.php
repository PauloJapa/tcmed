<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Questionario
 *
 * @ORM\Table(name="tcmed_questionario", indexes={@ORM\Index(name="fk_tcmed_questionario_tcmed_clinica1_idx", columns={"tcmed_clinica_id"})})
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\QuestionarioRepository")
 */
class Questionario extends \Application\Entity\AbstractEntity
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
     * @var string
     *
     * @ORM\Column(name="tcmed_questionariocol", type="string", length=45, nullable=true)
     */
    private $questionariocol;

    /**
     * @var \Clinica
     *
     * @ORM\ManyToOne(targetEntity="Clinica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tcmed_clinica_id", referencedColumnName="id_clinica")
     * })
     */
    private $clinica;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Pergunta", inversedBy="Questionario")
     * @ORM\JoinTable(name="tcmed_questionario_pergunta",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tcmed_questionario_id", referencedColumnName="id_questionario")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tcmed_pergunta_id", referencedColumnName="id_pergunta")
     *   }
     * )
     */
    private $pergunta;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pergunta = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Metodo padrão para o campo key da tabela
     * @return string
     */
    public function getId() {
        return $this->getIdQuestionario();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdQuestionario($id);
    }
    
    /**
     * 
     * @return integer
     */
    function getIdQuestionario() {
        return $this->idQuestionario;
    }

    /**
     * 
     * @return string
     */
    function getStatus() {
        return $this->status;
    }

    /**
     * 
     * @return string
     */
    function getQuestionariocol() {
        return $this->questionariocol;
    }

    /**
     * 
     * @return string
     */
    function getClinica() {
        return $this->clinica;
    }

    /**
     * 
     * @return string
     */
    function getPergunta() {
        return $this->pergunta;
    }

    /**
     * 
     * @param integer $idQuestionario
     */
    function setIdQuestionario($idQuestionario) {
        $this->idQuestionario = $idQuestionario;
    }

    /**
     * 
     * @param string $status
     */
    function setStatus($status) {
        $this->status = $status;
    }

    /**
     * 
     * @param string $questionariocol
     */
    function setQuestionariocol($questionariocol) {
        $this->questionariocol = $questionariocol;
    }

    /**
     * 
     * @param \Tcmed\Entity\Clinica $clinica
     */
    function setClinica(\Tcmed\Entity\Clinica $clinica) {
        $this->clinica = $clinica;
    }

    /**
     * 
     * @param \Doctrine\Common\Collections\Collection $Pergunta
     */
    function setPergunta(\Doctrine\Common\Collections\Collection $pergunta) {
        $this->pergunta = $pergunta;
    }



}

