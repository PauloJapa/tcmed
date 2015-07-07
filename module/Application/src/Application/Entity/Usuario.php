<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Math\Rand,
    Zend\Crypt\Key\Derivation\Pbkdf2;

use Zend\Stdlib\Hydrator;

 // (name="usuario", indexes={@ORM\Index(name="fk_usuario_funcionario1_idx", columns={"funcionario_id_funcionario"}), @ORM\Index(name="fk_usuario_nivelAcesso1_idx", columns={"nivelAcesso_id_nivelAcesso"}), @ORM\Index(name="fk_usuario_funcionario_ocorrencia1_idx", columns={"funcionario_ocorrencia_id_funcionario_ocorr"})})
/**
 * Usuario
 *
 * @ORM\Table(name="usuario", indexes={@ORM\Index(name="fk_usuario_app_role1", columns={"role_id"})}) 
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="UsuarioRepository")
 *  
 */
class Usuario extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_usuario", type="string", length=150, nullable=false)
     */
    private $nomeUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nickname", type="string", length=100, nullable=true)
     */
    private $nickname;

    /**
     * @var string
     *
     * @ORM\Column(name="senha_usuario", type="string", length=250, nullable=false)
     */
    private $senhaUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="email_usuario", type="string", length=250, nullable=true)
     */
    private $emailUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=250, nullable=true)
     */
    private $salt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="date", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="date", nullable=true)
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="situacao", type="string", length=10, nullable=false)
     */
    private $situacao;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_admin", type="integer", nullable=true)
     */
    private $isAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="lembrete_senha", type="string", length=250, nullable=true)
     */
    private $lembreteSenha;

    /**
     * @var string
     *
     * @ORM\Column(name="activation_key", type="string", length=255, nullable=false)
     */
    private $activationKey;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_usuario", type="string", length=50, nullable=true)
     */
    private $tipo;

    /**
     * @var \Application\Entity\AppRole
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\AppRole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id_role")
     * })
     */
    private $role;

    public function __construct(array $options = []) 
    {
        $this->createdAt = new \DateTime('now');
        $this->updatedAt = new \DateTime('now');
        
        $this->salt = base64_encode(Rand::getBytes(8, true));
        $this->activationKey = md5($this->emailUsuario . $this->salt);
        
        (new Hydrator\ClassMethods)->hydrate($options, $this);
    }   
    
    function getId() {
        return $this->getIdUsuario();
    }

    function setId($id) {
        $this->setIdUsuario($id);
        return $this;
    }

    
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    function getNome() {
        return $this->getNomeUsuario();
    }

    function getNickname() {
        return $this->nickname;
    }

    function getSenhaUsuario() {
        return $this->senhaUsuario;
    }

    function getPassword() {
        return $this->getSenhaUsuario();
    }

    function getEmailUsuario() {
        return $this->emailUsuario;
    }

    function getEmail() {
        return $this->getEmailUsuario();
    }

    function getSalt() {
        return $this->salt;
    }

    function getCreatedAt() {
        return $this->createdAt;
    }

    function getUpdatedAt() {
        return $this->updatedAt;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function getIsAdmin() {
        return $this->isAdmin;
    }

    function getLembreteSenha() {
        return $this->lembreteSenha;
    }

    /**
     * 
     * @return \Application\Entity\AppRole
     */
    public function getRole($obj = FALSE) {
        if($obj){
            return $this->role;            
        }
        return is_null($this->role)? '' : $this->role->getNome();
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
        return $this;
    }

    function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
        return $this;
    }

    function setNickname($nickname) {
        $this->nickname = $nickname;
        return $this;
    }

    function setSenhaUsuario($senhaUsuario) {
        $this->senhaUsuario = $this->encryptPassword($senhaUsuario);
        return $this;
    }
    
    public function encryptPassword($password) {
        return base64_encode(Pbkdf2::calc('sha256', $password, $this->salt, 10000, strlen($password * 2)));
    }

    function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
        return $this;
    }

    function setSalt($salt) {
        $this->salt = $salt;
        return $this;
    }

    function setCreatedAt() {
        $this->createdAt = new \DateTime('now');
        return $this;
    }

    /**
     * @ORM\prePersist
     * @return \Application\Entity\Usuario
     */
    function setUpdatedAt() {
        $this->updatedAt = new \DateTime('now');
        return $this;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
        return $this;
    }

    function setIsAdmin($isAdmin) {
        $this->isAdmin = $isAdmin;
        return $this;
    }

    function setLembreteSenha($lembreteSenha) {
        $this->lembreteSenha = $lembreteSenha;
        return $this;
    }

    public function getActivationKey() {
        return $this->activationKey;
    }

    public function setActivationKey($activationKey) {
        $this->activationKey = $activationKey;
        return $this;
    }
    
    function getActive() {
        return $this->active;
    }

    function setActive($active) {
        $this->active = $active;
        return $this;
    }


    function getTipo() {
        return $this->tipo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * 
     * @param \Application\Entity\AppRole $role
     * @return \Application\Entity\AppPrivilege
     */
    public function setRole(\Application\Entity\AppRole $role) {
        $this->role = $role;
        return $this;
    }

}

