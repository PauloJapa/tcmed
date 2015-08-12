<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TcmedRisco
 *
 * @ORM\Table(name="tcmed_risco")
 * @ORM\Entity
 */
class TcmedRisco
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_risco", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRisco;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=60, nullable=true)
     */
    private $descricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_inclusao", type="date", nullable=true)
     */
    private $dtInclusao;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=true)
     */
    private $status;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="TcmedModeloSeguranca", inversedBy="tcmedRiscoRisco")
     * @ORM\JoinTable(name="tcmed_modelo_seguranca_risco",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tcmed_risco_id_risco", referencedColumnName="id_risco")
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

