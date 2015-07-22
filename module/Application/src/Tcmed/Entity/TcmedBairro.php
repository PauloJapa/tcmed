<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TcmedBairro
 *
 * @ORM\Table(name="tcmed_bairro", indexes={@ORM\Index(name="fk_bairro_cidade1_idx", columns={"cidade_id_cidade"})})
 * @ORM\Entity
 */
class TcmedBairro
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_bairro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBairro;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_bairro", type="string", length=100, nullable=false)
     */
    private $nomeBairro;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'A';

    /**
     * @var \TcmedCidade
     *
     * @ORM\ManyToOne(targetEntity="TcmedCidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cidade_id_cidade", referencedColumnName="id_cidade")
     * })
     */
    private $cidadeCidade;


}

