<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipomeiocontato
 *
 * @ORM\Table(name="tcmed_tipoMeioContato")
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\TipoMeioContatoRepository")
 * @author Danilo Dorotheu
 */
class TipoMeioContato extends \Application\Entity\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipoMeioContato", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipomeiocontato;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=145, nullable=false)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="mascara", type="string", length=145, nullable=true)
     */
    private $mascara;

    /**
     * @var string
     *
     * @ORM\Column(name="er_validacao", type="string", length=145, nullable=true)
     */
    private $erValidacao;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=true)
     */
    private $status = 'A';

    /**
     * @var string
     *
     * @ORM\Column(name="created_by", type="string", length=45, nullable=true)
     */
    private $createdBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="updated_by", type="string", length=45, nullable=true)
     */
    private $updatedBy;
    
    /**
     * Id da entidade
     * @return type
     */
    public function getIdTipomeiocontato() {
        return $this->idTipomeiocontato;
    }
    /**
     * Alias para o ID da entidade
     * @return type
     */
    public function getId() {
        return $this->getIdTipomeiocontato();
    }
    /**
     * Retorna a descricao do tipo do meio de contato
     * @return type
     */
    public function getDescricao() {
        return $this->descricao;
    }
    /**
     * Retorna a mascara do tipo do meio de contato
     * @return type
     */
    public function getMascara() {
        return $this->mascara;
    }
    /**
     * Retorna a expressão regular para validar o tipo do meio de contato
     * @return type
     */
    public function getErValidacao() {
        return $this->erValidacao;
    }
    /**
     * Retorna o status 
     * @return type
     */
    public function getStatus() {
        return $this->status;
    }
    /**
     * Seta o ID da entidade
     * @param type $idTipomeiocontato
     * @return \Tcmed\Entity\TipoMeioContato
     */
    public function setIdTipomeiocontato($idTipomeiocontato) {
        $this->idTipomeiocontato = $idTipomeiocontato;
        return $this;
    }
    /**
     * Alias para setar o ID da entidade
     * @param type $idTipomeiocontato
     * @return \Tcmed\Entity\TipoMeioContato
     */
    public function setId($idTipomeiocontato) {
        $this->idTipomeiocontato = $idTipomeiocontato;
        return $this;
    }
    /**
     * Seta a descricao do tipo do meio de contato
     * @param type $descricao
     * @return \Tcmed\Entity\TipoMeioContato
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }
    /**
     * Seta a mascara do tipo do meio de contato
     * @param type $mascara
     * @return \Tcmed\Entity\TipoMeioContato
     */
    public function setMascara($mascara) {
        $this->mascara = $mascara;
        return $this;
    }
    /**
     * Seta a expressao regular para vidar o tipo do meio de contato
     * @param type $erValidacao
     * @return \Tcmed\Entity\TipoMeioContato
     */
    public function setErValidacao($erValidacao) {
        $this->erValidacao = $erValidacao;
        return $this;
    }
    /**
     * Seta o status
     * @param type $status
     * @return \Tcmed\Entity\TipoMeioContato
     */
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }




}

