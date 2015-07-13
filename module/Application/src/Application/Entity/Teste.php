<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teste
 *
 * @ORM\Table(name="teste")
 * @ORM\Entity(repositoryClass="\Application\Entity\Repository\TesteRepository")
 */
class Teste extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_teste", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTeste;

    /**
     * @var string
     *
     * @ORM\Column(name="campo1", type="string", length=100, nullable=false)
     */
    private $campo1;

    /**
     * @var string
     *
     * @ORM\Column(name="campo2", type="string", length=100, nullable=false)
     */
    private $campo2;

    /**
     * @var string
     *
     * @ORM\Column(name="campo3", type="string", length=100, nullable=false)
     */
    private $campo3;
    
    

    /**
     * Metodo padrão para o campo key da tabela
     * @return integer
     */
    public function getId() {
        return $this->getIdTeste();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param type $id
     * @return \Application\Entity\Teste
     */
    public function setId($id) {
        return $this->setIdTeste($id);
    }

    /**
     * 
     * @return integer
     */
    public function getIdTeste() {
        return $this->idTeste;
    }

    /**
     * 
     * @return string
     */
    public function getCampo1() {
        return $this->campo1;
    }

    /**
     * 
     * @return string
     */
    public function getCampo2() {
        return $this->campo2;
    }

    /**
     * 
     * @return string
     */
    public function getCampo3() {
        return $this->campo3;
    }

    /**
     * 
     * @param integer $idTeste
     * @return \Application\Entity\Teste
     */
    public function setIdTeste($idTeste) {
        $this->idTeste = $idTeste;
        return $this;
    }

    /**
     * 
     * @param string $campo1
     * @return \Application\Entity\Teste
     */
    public function setCampo1($campo1) {
        $this->campo1 = $campo1;
        return $this;
    }

    /**
     * 
     * @param string $campo1
     * @return \Application\Entity\Teste
     */
    public function setCampo2($campo2) {
        $this->campo2 = $campo2;
        return $this;
    }

    /**
     * 
     * @param string $campo1
     * @return \Application\Entity\Teste
     */
    public function setCampo3($campo3) {
        $this->campo3 = $campo3;
        return $this;
    }


}

