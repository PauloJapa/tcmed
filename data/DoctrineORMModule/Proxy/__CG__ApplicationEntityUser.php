<?php

namespace DoctrineORMModule\Proxy\__CG__\Application\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class User extends \Application\Entity\User implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Application\\Entity\\User' . "\0" . 'idUser', '' . "\0" . 'Application\\Entity\\User' . "\0" . 'usuarioId', '' . "\0" . 'Application\\Entity\\User' . "\0" . 'nome', '' . "\0" . 'Application\\Entity\\User' . "\0" . 'statusChat', '' . "\0" . 'Application\\Entity\\User' . "\0" . 'statusDatetime', '' . "\0" . 'Application\\Entity\\User' . "\0" . 'statusMsg', '' . "\0" . 'Application\\Entity\\User' . "\0" . 'status');
        }

        return array('__isInitialized__', '' . "\0" . 'Application\\Entity\\User' . "\0" . 'idUser', '' . "\0" . 'Application\\Entity\\User' . "\0" . 'usuarioId', '' . "\0" . 'Application\\Entity\\User' . "\0" . 'nome', '' . "\0" . 'Application\\Entity\\User' . "\0" . 'statusChat', '' . "\0" . 'Application\\Entity\\User' . "\0" . 'statusDatetime', '' . "\0" . 'Application\\Entity\\User' . "\0" . 'statusMsg', '' . "\0" . 'Application\\Entity\\User' . "\0" . 'status');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (User $proxy) {
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
    public function setId($idUser)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', array($idUser));

        return parent::setId($idUser);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdUser()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIdUser();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdUser', array());

        return parent::getIdUser();
    }

    /**
     * {@inheritDoc}
     */
    public function getUsuarioId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsuarioId', array());

        return parent::getUsuarioId();
    }

    /**
     * {@inheritDoc}
     */
    public function getNome()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNome', array());

        return parent::getNome();
    }

    /**
     * {@inheritDoc}
     */
    public function getStatusChat()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatusChat', array());

        return parent::getStatusChat();
    }

    /**
     * {@inheritDoc}
     */
    public function getStatusDatetime($obj = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatusDatetime', array($obj));

        return parent::getStatusDatetime($obj);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatusMsg()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatusMsg', array());

        return parent::getStatusMsg();
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
    public function setIdUser($idUser)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdUser', array($idUser));

        return parent::setIdUser($idUser);
    }

    /**
     * {@inheritDoc}
     */
    public function setUsuarioId($usuarioId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsuarioId', array($usuarioId));

        return parent::setUsuarioId($usuarioId);
    }

    /**
     * {@inheritDoc}
     */
    public function setNome($nome)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNome', array($nome));

        return parent::setNome($nome);
    }

    /**
     * {@inheritDoc}
     */
    public function setStatusChat($statusChat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatusChat', array($statusChat));

        return parent::setStatusChat($statusChat);
    }

    /**
     * {@inheritDoc}
     */
    public function setStatusDatetime($statusDatetime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatusDatetime', array($statusDatetime));

        return parent::setStatusDatetime($statusDatetime);
    }

    /**
     * {@inheritDoc}
     */
    public function setStatusMsg($statusMsg)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatusMsg', array($statusMsg));

        return parent::setStatusMsg($statusMsg);
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
    public function strToDate($strDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'strToDate', array($strDate));

        return parent::strToDate($strDate);
    }

}
