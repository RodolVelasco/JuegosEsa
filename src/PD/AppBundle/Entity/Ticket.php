<?php

namespace PD\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Ticket
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
      * @ORM\ManyToOne(targetEntity="PD\AppBundle\Entity\Libreta", inversedBy="tickets") 
      * @ORM\JoinColumn(name="libreta_id", referencedColumnName="id", nullable=false)
     */
    protected $libreta;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_ticket", type="string", length=25)
     */
    private $numeroTicket;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_aleatorio", type="string", length=1, nullable=true)
     */
    // private $numeroAleatorio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_recibido", type="datetime")
     */
    private $fechaRecibido;

    /**
     * @var string
     *
     * @ORM\Column(name="premio", type="string", length=50, nullable=true)
     */
    private $premio;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=50)
     */
    private $estado;
	/* 
	 * 1 = EN_RUTA
	 * 2 = EN_SALA_VENTAS
	 * 3 = VENDIDO
	 * 4 = PREMIADO
	 *
	 */
	
	

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
     * Set numeroTicket
     *
     * @param string $numeroTicket
     * @return Ticket
     */
    public function setNumeroTicket($numeroTicket)
    {
        $this->numeroTicket = $numeroTicket;

        return $this;
    }

    /**
     * Get numeroTicket
     *
     * @return string 
     */
    public function getNumeroTicket()
    {
        return $this->numeroTicket;
    }

    /**
     * Set numeroAleatorio
     *
     * @param string $numeroAleatorio
     * @return Ticket
     */
    /*public function setNumeroAleatorio($numeroAleatorio)
    {
        $this->numeroAleatorio = $numeroAleatorio;

        return $this;
    }*/

    /**
     * Get numeroAleatorio
     *
     * @return string 
     */
    /*public function getNumeroAleatorio()
    {
        return $this->numeroAleatorio;
    }*/

    /**
     * Set fechaRecibido
     *
     * @param \DateTime $fechaRecibido
     * @return Ticket
     */
    public function setFechaRecibido($fechaRecibido)
    {
        $this->fechaRecibido = $fechaRecibido;

        return $this;
    }

    /**
     * Get fechaRecibido
     *
     * @return \DateTime 
     */
    public function getFechaRecibido()
    {
        return $this->fechaRecibido;
    }

    /**
     * Set premio
     *
     * @param string $premio
     * @return Ticket
     */
    public function setPremio($premio)
    {
        $this->premio = $premio;

        return $this;
    }

    /**
     * Get premio
     *
     * @return string 
     */
    public function getPremio()
    {
        return $this->premio;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Ticket
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set libreta
     *
     * @param \PD\AppBundle\Entity\Libreta $libreta
     * @return Ticket
     */
    public function setLibreta(\PD\AppBundle\Entity\Libreta $libreta = null)
    {
        $this->libreta = $libreta;

        return $this;
    }

    /**
     * Get libreta
     *
     * @return \PD\AppBundle\Entity\Libreta 
     */
    public function getLibreta()
    {
        return $this->libreta;
    }
}
