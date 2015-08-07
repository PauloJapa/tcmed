<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consulta
 *
 * @ORM\Table(name="tcmed_consulta", indexes={@ORM\Index(name="fk_consulta_clinica1_idx", columns={"clinica_id_clinica"}), @ORM\Index(name="fk_consulta_medico2_idx", columns={"medico_id_medico"}), @ORM\Index(name="fk_consulta_funcionario2_idx", columns={"funcionario_id_funcionario"}), @ORM\Index(name="fk_consulta_cargo1_idx", columns={"cargo_id_cargo"}), @ORM\Index(name="fk_consulta_setor1_idx", columns={"setor_id_setor"}), @ORM\Index(name="fk_tcmed_consulta_tcmed_questionario1_idx", columns={"tcmed_questionario_id"})})
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\ConsultaRepository")
 * @author Allan Davini
 */
class Consulta extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_consulta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idConsulta;

    /**
     * @var integer
     *
     * @ORM\Column(name="funcionario_id_funcionario", type="integer", nullable=false)
     */
    private $IdFuncionario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_consulta", type="date", nullable=true)
     */
    private $dtConsulta;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';

    /**
     * @var \Questionario
     *
     * @ORM\ManyToOne(targetEntity="Questionario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tcmed_questionario_id", referencedColumnName="id_questionario")
     * })
     */
    private $questionario;

    /**
     * @var \Cargo
     *
     * @ORM\ManyToOne(targetEntity="Cargo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cargo_id_cargo", referencedColumnName="id_cargo")
     * })
     */
    private $cargoCargo;

    /**
     * @var \Clinica
     *
     * @ORM\ManyToOne(targetEntity="Clinica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clinica_id_clinica", referencedColumnName="id_clinica")
     * })
     */
    private $clinicaClinica;

    /**
     * @var \Medico
     *
     * @ORM\ManyToOne(targetEntity="Medico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="medico_id_medico", referencedColumnName="id_medico")
     * })
     */
    private $medicoMedico;

    /**
     * @var \Setor
     *
     * @ORM\ManyToOne(targetEntity="Setor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="setor_id_setor", referencedColumnName="id_setor")
     * })
     */
    private $setorSetor;
    
    
     /**
     * 
     * @return String
     */
    public function getId() {
        return $this->getIdConsulta();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdConsulta($id);
    }

    /**
     * 
     * @return integer
     */
    function getIdFuncionario() {
        return $this->IdFuncionario;
    }

    /**
     * 
     * @param type $obj
     * @param type $full
     * @return \DateTime
     */
    public function getDtConsulta($obj = FALSE, $full = FALSE) {
        return $this->dateToStr($this->createdAt, $full, $obj);
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
    function getQuestionario() {
        return $this->questionario;
    }

    /**
     * 
     * @return string
     */
    function getCargoCargo() {
        return $this->cargoCargo;
    }

    /**
     * 
     * @return string
     */
    function getClinicaClinica() {
        return $this->clinicaClinica;
    }

    /**
     * 
     * @return string
     */
    function getMedicoMedico() {
        return $this->medicoMedico;
    }

    /**
     * 
     * @return string
     */
    function getSetorSetor() {
        return $this->setorSetor;
    }

    /**
     * 
     * @param integer $idConsulta
     */
    function setIdConsulta($idConsulta) {
        $this->idConsulta = $idConsulta;
    }

    /**
     * 
     * @param integer $IdFuncionario
     */
    function setIdFuncionario($IdFuncionario) {
        $this->IdFuncionario = $IdFuncionario;
    }

    /**
     * 
     * @param \DateTime $dtConsulta
     * @return \Tcmed\Entity\Consulta
     */
     public function setDtConsulta(\DateTime $dtConsulta) {
        $this->createdAt = $this->strToDate($dtConsulta);
        return $this;
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
     * @param \Tcmed\Entity\Questionario $Questionario
     */
    function setQuestionario(\Tcmed\Entity\Questionario $questionario) {
        $this->Questionario = $questionario;
    }

    /**
     * 
     * @param \Tcmed\Entity\Cargo $cargoCargo
     */
    function setCargoCargo(\Tcmed\Entity\Cargo $cargoCargo) {
        $this->cargoCargo = $cargoCargo;
    }

    /**
     * 
     * @param \Tcmed\Entity\Clinica $clinicaClinica
     */
    function setClinicaClinica(\Tcmed\Entity\Clinica $clinicaClinica) {
        $this->clinicaClinica = $clinicaClinica;
    }

    /**
     * 
     * @param \Tcmed\Entity\Medico $medicoMedico
     */
    function setMedicoMedico(\Tcmed\Entity\Medico $medicoMedico) {
        $this->medicoMedico = $medicoMedico;
    }

    /**
     * 
     * @param \Tcmed\Entity\Setor $setorSetor
     */
    function setSetorSetor(\Tcmed\Entity\Setor $setorSetor) {
        $this->setorSetor = $setorSetor;
    }




}

