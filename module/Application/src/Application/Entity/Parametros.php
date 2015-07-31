<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

use Zend\Stdlib\Hydrator;
/**
 * Parametros
 *
 * @ORM\Table(name="parametros")
 * @ORM\Entity(repositoryClass="\Application\Entity\Repository\ParametrosRepository")
 */
class Parametros
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_parame", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idParame;

    /**
     * @var string
     *
     * @ORM\Column(name="chave", type="string", length=45, nullable=true)
     */
    private $chave;

    /**
     * @var string
     *
     * @ORM\Column(name="conteudo", type="string", length=45, nullable=true)
     */
    private $conteudo;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=45, nullable=true)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=true)
     */
    private $status;
    
    public function __construct(array $options = []) {
        (new Hydrator\ClassMethods)->hydrate($options, $this);
    }
    /**
     * Alias get para o ID da estidade
     * @return type
     * @author Danilo Dorotheu
     */
    function getId(){
        return $this->getIdParame();
    }
    /**
     * Alias set para o ID da estidade
     * @param type $idParame
     * @author Danilo Dorotheu
     */
    function setId($idParame){
        $this->setIdParame($idParame);
    }
    
    
    function getIdParame() {
        return $this->idParame;
    }

    function getChave() {
        return $this->chave;
    }

    function getConteudo() {
        return $this->conteudo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getStatus() {
        return $this->status;
    }

    function setIdParame($idParame) {
        $this->idParame = $idParame;
        return $this;
    }

    function setChave($chave) {
        $this->chave = $chave;
        return $this;
    }

    function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
        return $this;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

    function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    public function toArray()
    {
        $data = (new Hydrator\ClassMethods())->setUnderscoreSeparatedKeys(FALSE)->extract($this);
        return $data;
    }

}

