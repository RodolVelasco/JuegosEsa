<?php

namespace Proxies\__CG__\PD\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Caja extends \PD\AppBundle\Entity\Caja implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'id', 'numero_carton', 'contiene_libreta_limite_inferior', 'contiene_libreta_limite_superior', 'omite_libreta', 'total_libretas', 'libretas_asignadas', 'juego', 'sucursal', 'usuario', 'fecha_creacion', 'estado', 'libretas');
        }

        return array('__isInitialized__', 'id', 'numero_carton', 'contiene_libreta_limite_inferior', 'contiene_libreta_limite_superior', 'omite_libreta', 'total_libretas', 'libretas_asignadas', 'juego', 'sucursal', 'usuario', 'fecha_creacion', 'estado', 'libretas');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Caja $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setNumeroCarton($numeroCarton)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNumeroCarton', array($numeroCarton));

        return parent::setNumeroCarton($numeroCarton);
    }

    /**
     * {@inheritDoc}
     */
    public function getNumeroCarton()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNumeroCarton', array());

        return parent::getNumeroCarton();
    }

    /**
     * {@inheritDoc}
     */
    public function setContieneLibretaLimiteInferior($contieneLibretaLimiteInferior)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContieneLibretaLimiteInferior', array($contieneLibretaLimiteInferior));

        return parent::setContieneLibretaLimiteInferior($contieneLibretaLimiteInferior);
    }

    /**
     * {@inheritDoc}
     */
    public function getContieneLibretaLimiteInferior()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContieneLibretaLimiteInferior', array());

        return parent::getContieneLibretaLimiteInferior();
    }

    /**
     * {@inheritDoc}
     */
    public function setContieneLibretaLimiteSuperior($contieneLibretaLimiteSuperior)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContieneLibretaLimiteSuperior', array($contieneLibretaLimiteSuperior));

        return parent::setContieneLibretaLimiteSuperior($contieneLibretaLimiteSuperior);
    }

    /**
     * {@inheritDoc}
     */
    public function getContieneLibretaLimiteSuperior()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContieneLibretaLimiteSuperior', array());

        return parent::getContieneLibretaLimiteSuperior();
    }

    /**
     * {@inheritDoc}
     */
    public function setOmiteLibreta($omiteLibreta)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOmiteLibreta', array($omiteLibreta));

        return parent::setOmiteLibreta($omiteLibreta);
    }

    /**
     * {@inheritDoc}
     */
    public function getOmiteLibreta()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOmiteLibreta', array());

        return parent::getOmiteLibreta();
    }

    /**
     * {@inheritDoc}
     */
    public function setTotalLibretas($totalLibretas)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTotalLibretas', array($totalLibretas));

        return parent::setTotalLibretas($totalLibretas);
    }

    /**
     * {@inheritDoc}
     */
    public function getTotalLibretas()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTotalLibretas', array());

        return parent::getTotalLibretas();
    }

    /**
     * {@inheritDoc}
     */
    public function setJuego(\PD\AppBundle\Entity\Juego $juego)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setJuego', array($juego));

        return parent::setJuego($juego);
    }

    /**
     * {@inheritDoc}
     */
    public function getJuego()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJuego', array());

        return parent::getJuego();
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', array());

        return parent::__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function setSucursal(\PD\AppBundle\Entity\Sucursal $sucursal)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSucursal', array($sucursal));

        return parent::setSucursal($sucursal);
    }

    /**
     * {@inheritDoc}
     */
    public function getSucursal()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSucursal', array());

        return parent::getSucursal();
    }

    /**
     * {@inheritDoc}
     */
    public function setUsuario(\PD\AppBundle\Entity\Usuario $usuario)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsuario', array($usuario));

        return parent::setUsuario($usuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsuario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsuario', array());

        return parent::getUsuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setFechaCreacion($fechaCreacion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFechaCreacion', array($fechaCreacion));

        return parent::setFechaCreacion($fechaCreacion);
    }

    /**
     * {@inheritDoc}
     */
    public function getFechaCreacion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFechaCreacion', array());

        return parent::getFechaCreacion();
    }

    /**
     * {@inheritDoc}
     */
    public function setEstado($estado)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEstado', array($estado));

        return parent::setEstado($estado);
    }

    /**
     * {@inheritDoc}
     */
    public function getEstado()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEstado', array());

        return parent::getEstado();
    }

    /**
     * {@inheritDoc}
     */
    public function addLibreta(\PD\AppBundle\Entity\Libreta $libretas)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addLibreta', array($libretas));

        return parent::addLibreta($libretas);
    }

    /**
     * {@inheritDoc}
     */
    public function removeLibreta(\PD\AppBundle\Entity\Libreta $libretas)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeLibreta', array($libretas));

        return parent::removeLibreta($libretas);
    }

    /**
     * {@inheritDoc}
     */
    public function getLibretas()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLibretas', array());

        return parent::getLibretas();
    }

    /**
     * {@inheritDoc}
     */
    public function setLibretasAsignadas($libretasAsignadas)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLibretasAsignadas', array($libretasAsignadas));

        return parent::setLibretasAsignadas($libretasAsignadas);
    }

    /**
     * {@inheritDoc}
     */
    public function getLibretasAsignadas()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLibretasAsignadas', array());

        return parent::getLibretasAsignadas();
    }

}
