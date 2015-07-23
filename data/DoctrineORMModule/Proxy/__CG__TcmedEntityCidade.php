<?php

namespace DoctrineORMModule\Proxy\__CG__\Tcmed\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Cidade extends \Tcmed\Entity\Cidade implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Tcmed\\Entity\\Cidade' . "\0" . 'idCidade', '' . "\0" . 'Tcmed\\Entity\\Cidade' . "\0" . 'nomeCidade', '' . "\0" . 'Tcmed\\Entity\\Cidade' . "\0" . 'status', '' . "\0" . 'Tcmed\\Entity\\Cidade' . "\0" . 'estadoEstado');
        }

        return array('__isInitialized__', '' . "\0" . 'Tcmed\\Entity\\Cidade' . "\0" . 'idCidade', '' . "\0" . 'Tcmed\\Entity\\Cidade' . "\0" . 'nomeCidade', '' . "\0" . 'Tcmed\\Entity\\Cidade' . "\0" . 'status', '' . "\0" . 'Tcmed\\Entity\\Cidade' . "\0" . 'estadoEstado');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Cidade $proxy) {
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

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', array($id));

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdCidade()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIdCidade();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdCidade', array());

        return parent::getIdCidade();
    }

    /**
     * {@inheritDoc}
     */
    public function getNomeCidade()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomeCidade', array());

        return parent::getNomeCidade();
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', array());

        return parent::getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function getEstadoEstado()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEstadoEstado', array());

        return parent::getEstadoEstado();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdCidade($idCidade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdCidade', array($idCidade));

        return parent::setIdCidade($idCidade);
    }

    /**
     * {@inheritDoc}
     */
    public function setNomeCidade($nomeCidade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomeCidade', array($nomeCidade));

        return parent::setNomeCidade($nomeCidade);
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus($status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', array($status));

        return parent::setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function setEstadoEstado(\Tcmed\Entity\Estado $estadoEstado)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEstadoEstado', array($estadoEstado));

        return parent::setEstadoEstado($estadoEstado);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toArray', array());

        return parent::toArray();
    }

    /**
     * {@inheritDoc}
     */
    public function floatToStr($get, $dec = 2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'floatToStr', array($get, $dec));

        return parent::floatToStr($get, $dec);
    }

    /**
     * {@inheritDoc}
     */
    public function strToFloat($check)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'strToFloat', array($check));

        return parent::strToFloat($check);
    }

    /**
     * {@inheritDoc}
     */
    public function strToDate($strDateTime = '')
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'strToDate', array($strDateTime));

        return parent::strToDate($strDateTime);
    }

    /**
     * {@inheritDoc}
     */
    public function dateToStr($date, $full = false, $obj = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'dateToStr', array($date, $full, $obj));

        return parent::dateToStr($date, $full, $obj);
    }

}
