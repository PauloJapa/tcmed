<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityUsuario
 *
 * @ORM\Table(name="usuario", indexes={@ORM\Index(name="fk_usuario_app_role1", columns={"role_id"})})
 * @ORM\Entity
 */
class EntityUsuario
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
    private $tipoUsuario;

    /**
     * @var \Application\EntityAppRole
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityAppRole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id_role")
     * })
     */
    private $role;


}

