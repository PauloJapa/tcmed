<?php

namespace Application;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntityEnviado
 *
 * @ORM\Table(name="enviado", indexes={@ORM\Index(name="fk_enviado_user1_idx", columns={"from_id_user"}), @ORM\Index(name="fk_enviado_user2_idx", columns={"to_id_user"}), @ORM\Index(name="fk_enviado_mensagem1_idx", columns={"mensagem_id_mensagem"})})
 * @ORM\Entity
 */
class EntityEnviado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_enviado", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEnviado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_enviado", type="datetime", nullable=true)
     */
    private $dateEnviado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_recebido", type="datetime", nullable=true)
     */
    private $dateRecebido;

    /**
     * @var \Application\EntityUser
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="from_id_user", referencedColumnName="id_user")
     * })
     */
    private $fromUser;

    /**
     * @var \Application\EntityUser
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="to_id_user", referencedColumnName="id_user")
     * })
     */
    private $toUser;

    /**
     * @var \Application\EntityMensagem
     *
     * @ORM\ManyToOne(targetEntity="Application\EntityMensagem")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mensagem_id_mensagem", referencedColumnName="id_mensagem")
     * })
     */
    private $mensagemMensagem;


}

