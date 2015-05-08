<?php

namespace Code\CarBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Fabricante
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Fabricante
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;
    /**
     * @ORM\OneToMany(targetEntity="Code\CarBundle\Entity\Carro", mappedBy="fabricante")
     */
    private $carros;

    function __construct()
    {
        $this->carros = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getCarros()
    {
        return $this->carros;
    }

    /**
     * @param mixed $carros
     */
    public function addCarros($carro)
    {
        $this->carros[] = $carro;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Fabricante
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }
}
