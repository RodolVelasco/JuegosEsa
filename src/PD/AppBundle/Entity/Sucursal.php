<?php
namespace PD\AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use PD\AppBundle\Util\Util;
use Symfony\Component\Validator\Constraints as Assert;
use APY\DataGridBundle\Grid\Mapping as GRID;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="sucursal") 
 * 
 */
class Sucursal
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
		
	/**
	 * @ORM\Column(type="datetime", nullable=true)
     * @GRID\Column(field="fecha_ingreso_sistema", title="Fecha registro en sistema")
	 */
	protected $fecha_ingreso_sistema;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="string", length=20)
     * @GRID\Column(field="estado", title="Estado")
     */
    private $estado;
    /*
     * 1 = ACTIVO
     * 2 = INACTIVO
    */

	
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
     * @return Sucursal
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
     * Set fecha_ingreso_sistema
     *
     * @param \DateTime $fechaIngresoSistema
     * @return Sucursal
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
     * @return Sucursal
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
}
