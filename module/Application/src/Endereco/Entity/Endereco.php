<?php

namespace Endereco\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Endereco
 *
 * @ORM\Table(name="endereco", indexes={@ORM\Index(name="bairro_codigo", columns={"bairro_codigo"})})
 * @ORM\Entity
 */
class Endereco extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="endereco_codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $enderecoCodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="bairro_codigo", type="integer", nullable=true)
     */
    private $bairroCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco_cep", type="string", length=9, nullable=true)
     */
    private $enderecoCep;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco_logradouro", type="string", length=72, nullable=true)
     */
    private $enderecoLogradouro;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco_complemento", type="string", length=72, nullable=true)
     */
    private $enderecoComplemento;

    public function getId() {
        return $this->getEnderecoCodigo();
    }
    
    /**
     * Metodo padrão para setar o campo key da tabela
     * @param string $id
     * @return \Application\Entity\AppMenu
     */
    public function setId($id) {
        return $this->setEnderecoCodigo($id);
    }
    
    public function getEnderecoCodigo() {
        return $this->enderecoCodigo;
    }

    public function getBairroCodigo() {
        return $this->bairroCodigo;
    }

    public function getEnderecoCep() {
        return $this->enderecoCep;
    }

    public function getEnderecoLogradouro() {
        return $this->enderecoLogradouro;
    }

    public function getEnderecoComplemento() {
        return $this->enderecoComplemento;
    }

    public function setEnderecoCodigo($enderecoCodigo) {
        $this->enderecoCodigo = $enderecoCodigo;
        return $this;
    }

    public function setBairroCodigo($bairroCodigo) {
        $this->bairroCodigo = $bairroCodigo;
        return $this;
    }

    public function setEnderecoCep($enderecoCep) {
        $this->enderecoCep = $enderecoCep;
        return $this;
    }

    public function setEnderecoLogradouro($enderecoLogradouro) {
        $this->enderecoLogradouro = $enderecoLogradouro;
        return $this;
    }

    public function setEnderecoComplemento($enderecoComplemento) {
        $this->enderecoComplemento = $enderecoComplemento;
        return $this;
    }


    
}

