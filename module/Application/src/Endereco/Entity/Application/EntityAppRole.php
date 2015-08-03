<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityAppRole
 *
 * @ORM\Table(name="app_role", indexes={@ORM\Index(name="fk_app_role_app_role", columns={"parent_id"})})
 * @ORM\Entity
 */
class EntityAppRole
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_role", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRole;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_admin", type="boolean", nullable=true)
     */
    private $isAdmin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var \Application\EntityAppRole
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityAppRole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id_role")
     * })
     */
    private $parent;


}

