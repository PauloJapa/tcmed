<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TcmedEndereco
 *
 * @ORM\Table(name="tcmed_endereco", indexes={@ORM\Index(name="fk_endereco_logradouro1_idx", columns={"logradouro_id"})})
 * @ORM\Entity
 */
class TcmedEndereco
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_endereco", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEndereco;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=20, nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="complemento", type="string", length=100, nullable=true)
     */
    private $complemento;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=true)
     */
    private $status = 'A';

    /**
     * @var \TcmedLogradouro
     *
     * @ORM\ManyToOne(targetEntity="TcmedLogradouro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="logradouro_id", referencedColumnName="id_logradouro")
     * })
     */
    private $logradouro;


}

