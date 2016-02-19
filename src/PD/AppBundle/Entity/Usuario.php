<?php

namespace PD\AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints as Assert;
use APY\DataGridBundle\Grid\Mapping as GRID;

/**
 * Usuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PD\AppBundle\Entity\UsuarioRepository")
 * 
 */
class Usuario implements UserInterface
{
	/**
     * Método requerido por la interfaz UserInterface
     */
    public function eraseCredentials()
    {
    }

    /**
     * Método requerido por la interfaz UserInterface
     */
    public function getRoles()
    {
        return array('ROLE_USUARIO');
    }

    /**
     * Método requerido por la interfaz UserInterface
     */
    //public function getUsername()
    //{
    //    return $this->getEmail();
    //}
	
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
     * @ORM\Column(name="nombre", type="string", length=100)
     * @GRID\Column(title="Nombre")
     */
    private $nombre;
	
	/**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=100)
     * @GRID\Column(title="Apellidos")
     */
    private $apellidos;
	
	/**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=100)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=100)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     * @GRID\Column(title="Correo")
     */
    private $email;	

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="text")
     */
    private $direccion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="datetime")
     */
    private $fechaAlta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="datetime")
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="dui", type="string", length=9)
     */
    private $dui;
	
	/**
     * @var string
     *
     * @ORM\Column(name="tipo_usuario", type="string", length=25)
     * @GRID\Column(title="Rol")
     */
    private $tipoUsuario;
	/* 
	 * 1 = SUPER_ADMIN
	 * 2 = ADMIN 		administrador
	 * 3 = SUPERVISOR 	supervisor
	 * 4 = VENDEDOR 	vendedor de tickets
     * 5 = VENDEDOR_INDEPENDIENTE vendedor de tickets independiente
	 */

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="string", length=20)
     */
    private $estado;
    /* 
     * INACTIVO
     * ACTIVO
     */

    /** 
     * @ORM\ManyToOne(targetEntity="PD\AppBundle\Entity\Usuario", inversedBy="supervisados") 
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id", nullable=true)
     * @Assert\Type(type="PD\AppBundle\Entity\Usuario")
     * @GRID\Column(field="supervisor.nombre", title="Nombre supervisor")
     * @GRID\Column(field="supervisor.apellidos", title="Apellido supervisor")
     */
    protected $supervisor;

    /**
     * @ORM\OneToMany(targetEntity="PD\AppBundle\Entity\Usuario", mappedBy="supervisor", cascade={"persist"})
     */
    protected $supervisados;

    /**
     * @ORM\OneToMany(targetEntity="PD\AppBundle\Entity\Libreta", mappedBy="vendedor", cascade={"remove", "persist"})
     */
    protected $vendedores;


	public function __construct()
	{
		$this->fechaAlta = new \DateTime();
        $this->supervisados = new \Doctrine\Common\Collections\ArrayCollection();
	}

    public function getNombreApellidos(){
        return $this->getNombre().' '.$this->getApellidos();
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
     * @return Usuario
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
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Usuario
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Usuario
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Usuario
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Usuario
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return Usuario
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set dui
     *
     * @param string $dui
     * @return Usuario
     */
    public function setDui($dui)
    {
        $this->dui = $dui;

        return $this;
    }

    /**
     * Get dui
     *
     * @return string 
     */
    public function getDui()
    {
        return $this->dui;
    }
	
	public function __toString()
	{
    /*
     * 1 = SUPER_ADMIN
     * 2 = ADMIN        administrador
     * 3 = SUPERVISOR   supervisor
     * 4 = VENDEDOR     vendedor de tickets
     * 5 = VENDEDOR_INDEPENDIENTE vendedor de tickets independiente
    */
        if($this->getTipoUsuario() == 'SUPER_ADMIN'){
		  return $this->getNombre().' '.$this->getApellidos(). ' (Super Admin)';
        }
        if($this->getTipoUsuario() == 'ADMIN'){
          return $this->getNombre().' '.$this->getApellidos(). ' (Admin)';
        }
        if($this->getTipoUsuario() == 'SUPERVISOR'){
          return $this->getNombre().' '.$this->getApellidos(). ' (Supervisor)';
        }
        if($this->getTipoUsuario() == 'VENDEDOR'){
          return $this->getNombre().' '.$this->getApellidos(). ' (Vendedor)';
        }
        if($this->getTipoUsuario() == 'VENDEDOR_INDEPENDIENTE'){
          return $this->getNombre().' '.$this->getApellidos(). ' (Vendedor Independiente)';
        }else{
            return $this->getNombre().' '.$this->getApellidos();
        }
	}

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tipoUsuario
     *
     * @param integer $tipoUsuario
     * @return Usuario
     */
    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;

        return $this;
    }

    /**
     * Get tipoUsuario
     *
     * @return integer 
     */
    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Usuario
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
     * Set supervisor
     *
     * @param \PD\AppBundle\Entity\Usuario $supervisor
     * @return Usuario
     */
    public function setSupervisor(\PD\AppBundle\Entity\Usuario $supervisor = null)
    {
        $this->supervisor = $supervisor;

        return $this;
    }

    /**
     * Get supervisor
     *
     * @return \PD\AppBundle\Entity\Usuario 
     */
    public function getSupervisor()
    {
        return $this->supervisor;
    }

    /**
     * Add supervisados
     *
     * @param \PD\AppBundle\Entity\Usuario $supervisados
     * @return Usuario
     */
    public function addSupervisado(\PD\AppBundle\Entity\Usuario $supervisados)
    {
        //$this->supervisados[] = $supervisados;

        $supervisados->setSupervisor($this);
        
        $this->supervisados->add($supervisados);

        return $this;
    }

    /**
     * Remove supervisados
     *
     * @param \PD\AppBundle\Entity\Usuario $supervisados
     */
    public function removeSupervisado(\PD\AppBundle\Entity\Usuario $supervisados)
    {
        $this->supervisados->removeElement($supervisados);
    }

    /**
     * Get supervisados
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSupervisados()
    {
        return $this->supervisados;
    }


    // ----------------------------------------------------------------------

    /**
     * Add libretas
     *
     * @param \PD\AppBundle\Entity\Libreta $libretas
     * @return Caja
     */
    public function addVendedor(\PD\AppBundle\Entity\Libreta $libretas)
    {
        //$this->libretas[] = $libretas;
        //return $this;

        $libretas->setVendedor($this);
        $this->libretas->add($libretas);
        return $this;
    }

    /**
     * Remove libretas
     *
     * @param \PD\AppBundle\Entity\Libreta $libretas
     */
    public function removeVendedor(\PD\AppBundle\Entity\Libreta $libretas)
    {
        $this->libretas->removeElement($libretas);
    }

    /**
     * Get libretas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVendedores()
    {
        return $this->libretas;
    }
}
