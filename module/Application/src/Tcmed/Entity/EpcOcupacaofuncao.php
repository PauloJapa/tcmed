<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EpcOcupacaofuncao
 *
 * @ORM\Table(name="tcmed_epc_ocupacaoFuncao", indexes={@ORM\Index(name="fk_tcmed_epc_has_tcmed_ocupacaoFuncao1_tcmed_ocupacaoFuncao_idx", columns={"id_ocupacaoFuncao"}), @ORM\Index(name="fk_tcmed_epc_has_tcmed_ocupacaoFuncao1_tcmed_epc1_idx", columns={"id_epc"})})
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\EpcOcupacaofuncaoRepository")
 * @author Allan Davini
 */
class EpcOcupacaofuncao extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_epc_ocupacaoFuncao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEpcOcupacaofuncao;

    /**
     * @var boolean
     *
     * @ORM\Column(name="eficaz", type="boolean", nullable=true)
     */
    private $eficaz;

    /**
     * @var \TcmedEpc
     *
     * @ORM\ManyToOne(targetEntity="Epc")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_epc", referencedColumnName="id_epc")
     * })
     */
    private $idEpc;

    /**
     * @var \Ocupacaofuncao
     *
     * @ORM\ManyToOne(targetEntity="Ocupacaofuncao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ocupacaoFuncao", referencedColumnName="id_ocupacaoFuncao")
     * })
     */
    private $idOcupacaofuncao;


    /**
     * 
     * @return String
     */
    public function getId() {
        return $this->getIdEpcOcupacaofuncao();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setIdEpcOcupacaofuncao($id);
    }
    
    /**
     * 
     * @return integer
     */
    function getIdEpcOcupacaofuncao() {
        return $this->idEpcOcupacaofuncao;
    }

    /**
     * 
     * @return string
     */
    function getEficaz() {
        return $this->eficaz;
    }

    /**
     * 
     * @return string
     */
    function getIdEpc() {
        return $this->idEpc;
    }

    /**
     * 
     * @return string
     */
    function getIdOcupacaofuncao() {
        return $this->idOcupacaofuncao;
    }

    /**
     * 
     * @param integer $idEpcOcupacaofuncao
     */
    function setIdEpcOcupacaofuncao($idEpcOcupacaofuncao) {
        $this->idEpcOcupacaofuncao = $idEpcOcupacaofuncao;
    }

    /**
     * 
     * @param string $eficaz
     */
    function setEficaz($eficaz) {
        $this->eficaz = $eficaz;
    }

    /**
     * 
     * @param \Tcmed\Entity\Epc $idEpc
     */
    function setIdEpc(\Tcmed\Entity\Epc $idEpc) {
        $this->idEpc = $idEpc;
    }

    /**
     * 
     * @param \Tcmed\Entity\Ocupacaofuncao $idOcupacaofuncao
     */
    function setIdOcupacaofuncao(\Tcmed\Entity\Ocupacaofuncao $idOcupacaofuncao) {
        $this->idOcupacaofuncao = $idOcupacaofuncao;
    }


    
}

