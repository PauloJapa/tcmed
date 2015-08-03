<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityAppPrivilege
 *
 * @ORM\Table(name="app_privilege", indexes={@ORM\Index(name="fk_app_privilege_app_role1", columns={"role_id"}), @ORM\Index(name="fk_app_privilege_app_resource1", columns={"resource_id"})})
 * @ORM\Entity
 */
class EntityAppPrivilege
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_privilege", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPrivilege;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

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
     * @var \Application\EntityAppResource
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityAppResource")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="resource_id", referencedColumnName="id_resource")
     * })
     */
    private $resource;

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

