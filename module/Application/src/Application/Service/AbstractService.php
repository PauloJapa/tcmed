<?php

/*
 * License.
 * 
 */

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;

/**
 * Description of AbstractService
 *
 * Tem os metodos basicos para o Crud no BD
 * @author Paulo Cordeiro Watakabe <watakabe05@gmail.com>
 */
abstract class AbstractService {

    /**
     *
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;
    
    /**
     * Path para entidade a ser trabalhada
     * 
     * @var string 
     */
    protected $entity;
    
    /**
     * Esta variavel é instaciada ao fazer insert, update e delete
     * Contem um objeto da instancia $this->entity 
     * 
     * @var {$this->entity}  
     */
    protected $entityReal;
    
    /**
     * Caminha para a pasta base de Entidades
     * @var string
     */
    protected $basePath;
    
    /**
     * Dados do form a serem validados
     * @var array
     */
    protected $data;
    
    /**
     * Campos do formulario que tem relacionamento.
     * Passar o id do campo e o caminho para entidade que será referenciada.
     * @var array
     */
    protected $dataRef = [];
    
    /**
     * String no formato para gravação de alterações feitas no registro
     * Formato campo  nome; valor antes; valor depois;
     * @var string
     */
    protected $dePara = '';
    
    /**
     * Chave no array que representa o id do registro default id
     * @var string
     */
    protected $id;
    
    /**
     * Para Casos em que não se pode validar registro
     * @var boolean
     */
    protected $isValid = TRUE;
    
    /**
     * Define se vai comitar as alterações do BD 
     * Para controle de alterações e melhorar desempenho 
     * @var boolean 
     */
    protected $flush = true;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->basePath = 'Application\Entity\\';
        $this->id = 'id';
    }

    public function insert(array $data = []) {
        if(!empty($data)){
            $this->data = $data;
        }
        
        $this->setReferences();
        
        $this->entityReal = new $this->entity($this->data);
        
        $this->em->persist($this->entityReal);
        if ($this->getFlush()) {
            $this->em->flush();
            $this->data[$this->id] = $this->entityReal->getId();
        }        
        return $this->entityReal;
    }

    public function update(array $data = []) {
        if(!empty($data)){
            $this->data = $data;
        }
        
        $this->getDiff();            
        
        switch (TRUE) {
            case empty($this->dePara):
                return $this->entityReal;
                
            case $this->dePara == 'force':
                $this->entityReal = $this->em->getReference($this->entity, $this->data[$this->id]);
                break;
            default:
                $this->entityReal = $this->em->getReference($this->entity, $this->data[$this->id]);
                break;
        }
                
        $this->setReferences();

        (new Hydrator\ClassMethods)->hydrate($this->data, $this->entityReal);        
        
        $this->em->persist($this->entityReal);
        if ($this->getFlush()) {
            $this->em->flush();
        }
        return $this->entityReal;
    }
    
    public function getDiff() {
        $this->dePara = 'force';
    }

    public function delete($id) {
        $entity = $this->em->getReference($this->entity, $id);
        if ($entity) {
            $this->em->remove($entity);
            $this->em->flush();
            return $id;
        }
    }
    
    /**
     * Parametriza varias referencia de entidades atraves de um array
     * Não apaga as referencias anteriores
     * @param array $option
     */
    public function setDataRefArray(array $option =[]) {
        if(empty($this->dataRef)){
            $this->dataRef = $option;            
        }else{
            $this->dataRef = array_merge($this->dataRef,$option);                        
        }
    }
    
    /**
     * Parametriza uma referencia de entidades
     * @param string $key
     * @param string $entityPath
     */
    public function setDataRef($key = '',$entityPath = '') {
        $this->dataRef[$key] = $entityPath;        
    }
    
    /**
     * Setas as referencias se parametrizadas pelo SetDataRef
     */
    public function setReferences(){
        //Pega uma referencia do registro no doctrine 
        foreach ($this->dataRef as $key => $value){
            $this->data[$key] = $this->idToReference($key, $value);  
        }
    }      
    
    /**
     * Converte o id de um campo em um referencia a sua entidade da relação 
     * @param string $index   Indice do array a ser feita a ligação
     * @param string $entity  Caminho para a Entity 
     * @return boolean
     */
    public function idToReference($index, $entity){
        if((!isset($this->data[$index])) OR (empty($this->data[$index]))){
//            echo '<pre>', var_dump($this->data[$index]), '</pre>';die;
            return NULL;
        }        
        if (is_object($this->data[$index])) {
            return ($this->data[$index] instanceof $entity)? $this->data[$index] : NULL;
        }
        return $this->em->getReference($entity, $this->data[$index]);
    }
    
    /**
     * Converte o id de um registro dependente em um Entity
     * @param string $index   Indice do array a ser feita a ligação
     * @param string $entity  Caminho para a Entity 
     */
    public function idToEntity($index, $entity){
        if((!isset($this->data[$index])) OR (empty($this->data[$index]))){
            echo "erro no indice e nao pode ser carregar entity ", $index;
            return FALSE;
        }
        
        if(is_object($this->data[$index])){
            if($this->data[$index] instanceof $entity)
                return TRUE;
            else
                return FALSE;
        }
            
        $this->data[$index] = $this->em->find($entity, $this->data[$index]);
    }
    
    /**
     * Faz a comparação de alteração e retorna uma string no formato para gravação.
     * @param string $input
     * @param string $after
     * @param string $before
     * @return string
     */
    public function diffAfterBefore($input,$after,$before){
        if($after != $before){
            return $input . ';' . $after . ';' . $before . ';';
        }
        return '';
    }
    
    /**
     * Para situaçoes em que não se deve validar o regitro no BD
     */
    public function notValidateNew(){
        $this->isValid = FALSE;
    }
    
    /**
     * Se vai comitar as operações do BD.
     * @param boolen $flush
     * return this
     */
    public function setFlush($flush) {
        $this->flush = ( $flush ) ? TRUE : FALSE;
        return $this;
    }
    
    /**
     * Se vai comitar as operações do BD.
     * return boolean
     */
    public function getFlush() {
        if (is_null($this->flush)){
            $this->flush = TRUE ;
        }
        return ( $this->flush ) ? TRUE : FALSE ;
    }

} 
