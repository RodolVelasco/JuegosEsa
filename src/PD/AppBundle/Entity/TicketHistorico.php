<?php

namespace PD\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketHistorico
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TicketHistorico
{
	/**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="PD\AppBundle\Entity\Ticket")
	 */
	protected $ticket;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
	 * 
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=50)
     */
    private $estado;
	/* 
	 * 1 = CREADO
	 * 2 = EN_RUTA
	 * 3 = EN_SALA_VENTAS
	 * 3 = VENDIDO
	 * 4 = PREMIADO
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return TicketHistorico
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return TicketHistorico
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
     * Set id
     *
     * @param integer $id
     * @return TicketHistorico
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set ticket
     *
     * @param \PD\AganarBundle\Entity\Ticket $ticket
     * @return TicketHistorico
     */
    public function setTicket(\PD\AganarBundle\Entity\Ticket $ticket)
    {
        $this->ticket = $ticket;

        return $this;
    }

    /**
     * Get ticket
     *
     * @return \PD\AganarBundle\Entity\Ticket 
     */
    public function getTicket()
    {
        return $this->ticket;
    }
}
