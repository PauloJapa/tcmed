<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TcmedEpcOcupacaofuncao
 *
 * @ORM\Table(name="tcmed_epc_ocupacaoFuncao", indexes={@ORM\Index(name="fk_tcmed_epc_has_tcmed_ocupacaoFuncao1_tcmed_ocupacaoFuncao_idx", columns={"id_ocupacaoFuncao"}), @ORM\Index(name="fk_tcmed_epc_has_tcmed_ocupacaoFuncao1_tcmed_epc1_idx", columns={"id_epc"})})
 * @ORM\Entity
 */
class TcmedEpcOcupacaofuncao
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_epc_ocupacaoFuncao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEpcOcupacaofuncao;

    /**
     * @var boolean
     *
     * @ORM\Column(name="eficaz", type="boolean", nullable=true)
     */
    private $eficaz;

    /**
     * @var \TcmedEpc
     *
     * @ORM\ManyToOne(targetEntity="TcmedEpc")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_epc", referencedColumnName="id_epc")
     * })
     */
    private $idEpc;

    /**
     * @var \TcmedOcupacaofuncao
     *
     * @ORM\ManyToOne(targetEntity="TcmedOcupacaofuncao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ocupacaoFuncao", referencedColumnName="id_ocupacaoFuncao")
     * })
     */
    private $idOcupacaofuncao;


}

