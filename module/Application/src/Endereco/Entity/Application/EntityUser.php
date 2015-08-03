<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityUser
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class EntityUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario_id", type="integer", nullable=true)
     */
    private $usuarioId;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="status_chat", type="string", length=15, nullable=true)
     */
    private $statusChat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="status_datetime", type="datetime", nullable=true)
     */
    private $statusDatetime;

    /**
     * @var string
     *
     * @ORM\Column(name="status_msg", type="string", length=45, nullable=true)
     */
    private $statusMsg;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=true)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="access_datetime", type="datetime", nullable=true)
     */
    private $accessDatetime;


}

