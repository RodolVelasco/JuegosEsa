<?php
namespace PD\AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use PD\AppBundle\Util\Util;

use Symfony\Component\Validator\Constraints as Assert;
use APY\DataGridBundle\Grid\Mapping as GRID;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="juego") 
 * 
 */
class Juego
{
	/**
	 * 
	 * @ORM\Id 
	 * @ORM\Column(type="integer") 
	 * @ORM\GeneratedValue
	 */
	protected $id;
	
	/** @ORM\Column(type="string", length=100) 
     * @GRID\Column(field="nombre", title="Nombre")
     */
	protected $nombre;
	
	/** @ORM\Column(type="integer") 
     * @GRID\Column(field="numero_tickets", title="Número de tickets")
     */
	protected $numero_tickets;
	
	/** @ORM\Column(name="precio_x_ticket", type="decimal", scale=2) 
     * @GRID\Column(field="precio_x_ticket", title="Precio por ticket")
     */
    protected $precio_x_ticket;
	
	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	protected $fecha_ingreso_sistema;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="string", length=20)
     * @GRID\Column(title="Estado")
     */
    private $estado;


	
	public function __construct()
	{
		$this->fecha_ingreso_sistema = new \DateTime();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Juego
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set numero_tickets
     *
     * @param integer $numeroTickets
     * @return Juego
     */
    public function setNumeroTickets($numeroTickets)
    {
        $this->numero_tickets = $numeroTickets;

        return $this;
    }

    /**
     * Get numero_tickets
     *
     * @return integer 
     */
    public function getNumeroTickets()
    {
        return $this->numero_tickets;
    }

    /**
     * Set fecha_ingreso_sistema
     *
     * @param \DateTime $fechaIngresoSistema
     * @return Juego
     */
    public function setFechaIngresoSistema($fechaIngresoSistema)
    {
        $this->fecha_ingreso_sistema = $fechaIngresoSistema;

        return $this;
    }

    /**
     * Get fecha_ingreso_sistema
     *
     * @return \DateTime 
     */
    public function getFechaIngresoSistema()
    {
        return $this->fecha_ingreso_sistema;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Juego
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }

	public function __toString()
	{
			return $this->getNombre();
	}

    /**
     * Set precio_x_ticket
     *
     * @param string $precioXTicket
     * @return Juego
     */
    public function setPrecioXTicket($precioXTicket)
    {
        $this->precio_x_ticket = $precioXTicket;

        return $this;
    }

    /**
     * Get precio_x_ticket
     *
     * @return string 
     */
    public function getPrecioXTicket()
    {
        return $this->precio_x_ticket;
    }
}
