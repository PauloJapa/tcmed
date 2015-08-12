<?php

namespace DoctrineORMModule\Proxy\__CG__\Tcmed\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class TipoMeioContato extends \Tcmed\Entity\TipoMeioContato implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'idTipomeiocontato', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'descricao', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'mascara', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'erValidacao', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'status', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'createdBy', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'createdAt', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'updatedAt', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'updatedBy');
        }

        return array('__isInitialized__', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'idTipomeiocontato', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'descricao', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'mascara', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'erValidacao', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'status', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'createdBy', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'createdAt', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'updatedAt', '' . "\0" . 'Tcmed\\Entity\\TipoMeioContato' . "\0" . 'updatedBy');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (TipoMeioContato $proxy) {
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
    public function getIdTipomeiocontato()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIdTipomeiocontato();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdTipomeiocontato', array());

        return parent::getIdTipomeiocontato();
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
    public function getDescricao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescricao', array());

        return parent::getDescricao();
    }

    /**
     * {@inheritDoc}
     */
    public function getMascara()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMascara', array());

        return parent::getMascara();
    }

    /**
     * {@inheritDoc}
     */
    public function getErValidacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getErValidacao', array());

        return parent::getErValidacao();
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
    public function setIdTipomeiocontato($idTipomeiocontato)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdTipomeiocontato', array($idTipomeiocontato));

        return parent::setIdTipomeiocontato($idTipomeiocontato);
    }

    /**
     * {@inheritDoc}
     */
    public function setId($idTipomeiocontato)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', array($idTipomeiocontato));

        return parent::setId($idTipomeiocontato);
    }

    /**
     * {@inheritDoc}
     */
    public function setDescricao($descricao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescricao', array($descricao));

        return parent::setDescricao($descricao);
    }

    /**
     * {@inheritDoc}
     */
    public function setMascara($mascara)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMascara', array($mascara));

        return parent::setMascara($mascara);
    }

    /**
     * {@inheritDoc}
     */
    public function setErValidacao($erValidacao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setErValidacao', array($erValidacao));

        return parent::setErValidacao($erValidacao);
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
