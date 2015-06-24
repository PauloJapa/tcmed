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
     * Faz tratamento da string 
     * @param type $strDateTime
     * @return \DateTime
     */
    public function strToDate($strDateTime) {
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
     * @param \DateTime $date
     * @param type $full
     * @return string  Data e hora , somente data ou - quando não for obj datetime
     */
    public function dateToStr($date,$full = false) {        
        if ($date instanceof \DateTime){
            if($full){
                return $date->format('d/m/Y h:m');
            }else{
                return $date->format('d/m/Y');
            }
        }else{
            return '-';
        }
    }
}
