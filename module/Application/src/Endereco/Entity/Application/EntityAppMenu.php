<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityAppMenu
 *
 * @ORM\Table(name="app_menu", indexes={@ORM\Index(name="fk_menu_menu1_idx", columns={"in_menu"})})
 * @ORM\Entity
 */
class EntityAppMenu
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_menu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMenu;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=45, nullable=true)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=45, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=45, nullable=true)
     */
    private $route;

    /**
     * @var string
     *
     * @ORM\Column(name="controller", type="string", length=45, nullable=true)
     */
    private $controller;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=45, nullable=true)
     */
    private $action;

    /**
     * @var string
     *
     * @ORM\Column(name="atributos", type="string", length=45, nullable=true)
     */
    private $atributos;

    /**
     * @var string
     *
     * @ORM\Column(name="icons", type="string", length=250, nullable=true)
     */
    private $icons;

    /**
     * @var string
     *
     * @ORM\Column(name="class", type="string", length=45, nullable=true)
     */
    private $class;

    /**
     * @var string
     *
     * @ORM\Column(name="pagesContainerClass", type="string", length=45, nullable=true)
     */
    private $pagescontainerclass;

    /**
     * @var string
     *
     * @ORM\Column(name="wrapClass", type="string", length=45, nullable=true)
     */
    private $wrapclass;

    /**
     * @var string
     *
     * @ORM\Column(name="ordem", type="string", length=45, nullable=true)
     */
    private $ordem;

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
     * @var string
     *
     * @ORM\Column(name="resource", type="string", length=100, nullable=true)
     */
    private $resource;

    /**
     * @var string
     *
     * @ORM\Column(name="privilege", type="string", length=45, nullable=true)
     */
    private $privilege;

    /**
     * @var \Application\EntityAppMenu
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityAppMenu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="in_menu", referencedColumnName="id_menu")
     * })
     */
    private $inMenu;


}

