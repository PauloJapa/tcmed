<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityContato
 *
 * @ORM\Table(name="contato", indexes={@ORM\Index(name="fk_contato_user_idx", columns={"user_id_user"}), @ORM\Index(name="fk_contato_user1_idx", columns={"contato_id_user"}), @ORM\Index(name="fk_contato_grupo1_idx", columns={"grupo_id_grupo"})})
 * @ORM\Entity
 */
class EntityContato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_contato", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idContato;

    /**
     * @var \Application\EntityUser
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id_user", referencedColumnName="id_user")
     * })
     */
    private $userUser;

    /**
     * @var \Application\EntityUser
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contato_id_user", referencedColumnName="id_user")
     * })
     */
    private $contatoUser;

    /**
     * @var \Application\EntityGrupo
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityGrupo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grupo_id_grupo", referencedColumnName="id_grupo")
     * })
     */
    private $grupoGrupo;


}

