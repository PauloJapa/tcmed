<?php

namespace Tcmed\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Epc
 *
 * @ORM\Table(name="tcmed_epc")
 * @ORM\Entity(repositoryClass="\Tcmed\Entity\Repository\EpcRepository")
 * @author Danilo Dorotheu 
 */
class Epc
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_epc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEpc;

    /**
     * @var string
     *
     * @ORM\Column(name="epc", type="string", length=200, nullable=false)
     */
    private $epc;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'ativo';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="date", nullable=false)
     */
    private $dtCadastro;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="TcmedModeloSeguranca", inversedBy="tcmedEpcEpc")
     * @ORM\JoinTable(name="tcmed_modelo_seguranca_epc",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tcmed_epc_id_epc", referencedColumnName="id_epc")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tcmed_modelo_seguranca_id_modeloSeguranca", referencedColumnName="id_modeloSeguranca")
     *   }
     * )
     */
    private $tcmedModeloSegurancaModeloseguranca;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tcmedModeloSegurancaModeloseguranca = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

