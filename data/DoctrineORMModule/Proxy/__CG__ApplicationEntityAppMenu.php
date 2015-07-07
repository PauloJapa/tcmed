<?php

namespace DoctrineORMModule\Proxy\__CG__\Application\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class AppMenu extends \Application\Entity\AppMenu implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'idMenu', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'descricao', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'label', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'route', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'controller', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'action', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'atributos', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'icons', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'class', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'pagescontainerclass', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'wrapclass', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'resource', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'privilege', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'ordem', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'createdAt', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'updatedAt', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'inMenu');
        }

        return array('__isInitialized__', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'idMenu', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'descricao', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'label', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'route', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'controller', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'action', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'atributos', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'icons', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'class', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'pagescontainerclass', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'wrapclass', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'resource', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'privilege', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'ordem', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'createdAt', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'updatedAt', '' . "\0" . 'Application\\Entity\\AppMenu' . "\0" . 'inMenu');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (AppMenu $proxy) {
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
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', array());

        return parent::__toString();
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
    public function getIdMenu()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIdMenu();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdMenu', array());

        return parent::getIdMenu();
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
    public function getLabel()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLabel', array());

        return parent::getLabel();
    }

    /**
     * {@inheritDoc}
     */
    public function getRoute()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRoute', array());

        return parent::getRoute();
    }

    /**
     * {@inheritDoc}
     */
    public function getController()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getController', array());

        return parent::getController();
    }

    /**
     * {@inheritDoc}
     */
    public function getAction()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAction', array());

        return parent::getAction();
    }

    /**
     * {@inheritDoc}
     */
    public function getAtributos()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAtributos', array());

        return parent::getAtributos();
    }

    /**
     * {@inheritDoc}
     */
    public function getIcons()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIcons', array());

        return parent::getIcons();
    }

    /**
     * {@inheritDoc}
     */
    public function getClass()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClass', array());

        return parent::getClass();
    }

    /**
     * {@inheritDoc}
     */
    public function getPagescontainerclass()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPagescontainerclass', array());

        return parent::getPagescontainerclass();
    }

    /**
     * {@inheritDoc}
     */
    public function getWrapclass()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWrapclass', array());

        return parent::getWrapclass();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrdem()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrdem', array());

        return parent::getOrdem();
    }

    /**
     * {@inheritDoc}
     */
    public function getResource()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getResource', array());

        return parent::getResource();
    }

    /**
     * {@inheritDoc}
     */
    public function getPrivilege()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrivilege', array());

        return parent::getPrivilege();
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt($obj = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', array($obj));

        return parent::getCreatedAt($obj);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt($obj = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', array($obj));

        return parent::getUpdatedAt($obj);
    }

    /**
     * {@inheritDoc}
     */
    public function getInMenu()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getInMenu', array());

        return parent::getInMenu();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdMenu($idMenu)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdMenu', array($idMenu));

        return parent::setIdMenu($idMenu);
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
    public function setLabel($label)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLabel', array($label));

        return parent::setLabel($label);
    }

    /**
     * {@inheritDoc}
     */
    public function setRoute($route)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRoute', array($route));

        return parent::setRoute($route);
    }

    /**
     * {@inheritDoc}
     */
    public function setController($controller)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setController', array($controller));

        return parent::setController($controller);
    }

    /**
     * {@inheritDoc}
     */
    public function setAction($action)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAction', array($action));

        return parent::setAction($action);
    }

    /**
     * {@inheritDoc}
     */
    public function setAtributos($atributos)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAtributos', array($atributos));

        return parent::setAtributos($atributos);
    }

    /**
     * {@inheritDoc}
     */
    public function setIcons($icons)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIcons', array($icons));

        return parent::setIcons($icons);
    }

    /**
     * {@inheritDoc}
     */
    public function setClass($class)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClass', array($class));

        return parent::setClass($class);
    }

    /**
     * {@inheritDoc}
     */
    public function setPagescontainerclass($pagescontainerclass)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPagescontainerclass', array($pagescontainerclass));

        return parent::setPagescontainerclass($pagescontainerclass);
    }

    /**
     * {@inheritDoc}
     */
    public function setWrapclass($wrapclass)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWrapclass', array($wrapclass));

        return parent::setWrapclass($wrapclass);
    }

    /**
     * {@inheritDoc}
     */
    public function setResource($resource)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setResource', array($resource));

        return parent::setResource($resource);
    }

    /**
     * {@inheritDoc}
     */
    public function setPrivilege($privilege)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrivilege', array($privilege));

        return parent::setPrivilege($privilege);
    }

    /**
     * {@inheritDoc}
     */
    public function setOrdem($ordem)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOrdem', array($ordem));

        return parent::setOrdem($ordem);
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt($createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', array($createdAt));

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', array());

        return parent::setUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setInMenu(\Application\Entity\AppMenu $inMenu = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setInMenu', array($inMenu));

        return parent::setInMenu($inMenu);
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
    public function strToDate($strDateTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'strToDate', array($strDateTime));

        return parent::strToDate($strDateTime);
    }

    /**
     * {@inheritDoc}
     */
    public function dateToStr($date, $full = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'dateToStr', array($date, $full));

        return parent::dateToStr($date, $full);
    }

}
