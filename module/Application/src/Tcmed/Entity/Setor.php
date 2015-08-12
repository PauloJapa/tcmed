<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Setor
 *
 * @ORM\Table(name="tcmed_setor")
 * @ORM\Entity
 */
class Setor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_setor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSetor;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_setor", type="string", length=45, nullable=false)
     */
    private $nomeSetor;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=false)
     */
    private $status = 'ativo';


}

