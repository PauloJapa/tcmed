<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TcmedEpi
 *
 * @ORM\Table(name="tcmed_epi")
 * @ORM\Entity
 */
class TcmedEpi
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_epi", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEpi;

    /**
     * @var string
     *
     * @ORM\Column(name="epi", type="string", length=200, nullable=false)
     */
    private $epi;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="date", nullable=false)
     */
    private $dtCadastro;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="TcmedModeloSeguranca", inversedBy="tcmedEpiEpi")
     * @ORM\JoinTable(name="tcmed_modelo_seguranca_epi",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tcmed_epi_id_epi", referencedColumnName="id_epi")
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

