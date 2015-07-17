<?php

/*
 * License 
 */

namespace Application\Entity;

use Zend\Stdlib\Hydrator;

/**
 * Description of AbstractEntity
 * Metodos abstraidos comum para entidades
 *
 * @author Paulo Watakabe 
 */
abstract class AbstractEntity { 
 
    
    public function __construct(array $options = []) {
        (new Hydrator\ClassMethods)->hydrate($options, $this);
    }  
    
    public function toArray(){
        return (new Hydrator\ClassMethods())->setUnderscoreSeparatedKeys(FALSE)->extract($this);
    } 
    
    /** 
     * Converte a variavel do tipo float para string para exibição
     * @param String $get com nome do metodo a ser convertido
     * @param Int $dec quantidade de casas decimais
     * @return String do numero no formato brasileiro padrão com 2 casas decimais
     */    
    public function floatToStr($get,$dec = 2){
        if($get == ""){
            return "vazio!!";
        }
        $getter  = 'get' . ucwords($get);
        if(!method_exists($this,$getter)){
            return "Erro no metodo!!";
        }
        $float = call_user_func(array($this,$getter));
        return number_format($float, $dec, ',','.');
    }
 
    /** 
     * Faz tratamento na variavel string se necessario antes de converte em float
     * @param String $check variavel a ser convertida se tratada se necessario
     * @return String $check no formato float para gravação pelo doctrine
     */    
    public function strToFloat($check){
        if(is_string($check)){
            //Retira tudo que não for numero e virgula e depois converte virgula em ponto
            return str_replace(",", ".", preg_replace("/[^0-9,]/", "", $check));
        }
        return $check;
    }
    
    /**
     * Converte um string para obj datetime se for um string valida
     * Caso o parametro for um object datetime retornara ele proprio
     * Faz tratamento da string 
     * @param string | \DateTime $strDateTime
     * @return \DateTime
     */
    public function strToDate($strDateTime = '') {    
        if ($strDateTime instanceof \DateTime){
            return $strDateTime;
        }
        switch (TRUE) {
            case empty($strDateTime):
                return new \DateTime('now');
                
            case ($strDateTime[2] == '/'):
                if(isset($strDateTime[15])){
                    $dh = explode(' ', $strDateTime);
                    $d = explode('/', $dh[0]);
                    $h = $dh[1];
                }else{
                    $d = explode('/', $strDateTime);
                    $h = '';
                }
                $s = $d[2] . '-' . $d[1] . '-' . $d[0] . $h;
                break;
                
            default:
                $s = $strDateTime;
        }
        return new \DateTime($s);
    }
    
    /**
     * Converte um obj datetime para string para exibição html
     * Caso $full for string ele usa como parametro para formatação da data
     * Caso $full for falso  ele converte como parametro para formatação da data de d/m/Y
     * Caso $obj contiver a string "full" parametriza $full para 'd/m/Y h:m'
     * Caso $obj for True retorna o proprio object
     * @param \DateTime $date
     * @param string | bollean $full
     * @param string | bollean $obj
     * @return string | \DateTime
     */
    public function dateToStr($date,$full = false, $obj = false) {  
        if($obj === TRUE){
            return $date;
        }
        if($obj == 'full'){
            $full = 'd/m/Y H:i:s';
            $obj = FALSE;
        }else{
            if (!is_string($full)){
                $full = 'd/m/Y';                
            }
        }      
        if ($date instanceof \DateTime){
            return $date->format($full);
        }else{
            return '-';
        }
    }
}
