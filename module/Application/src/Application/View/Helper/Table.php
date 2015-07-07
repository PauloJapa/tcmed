<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;
/**
 * Table
 * View Helper para exibir dados em tabelas
 * @author Paulo Cordeiro Watakabe <watakabe05@gmail.com>
 */
class Table extends AbstractHelper {

    /**
     * com propriedades a serem colocas no td. 
     * @var array $tdopt 
     */
    protected $tdopt;
    
    /**
     * com a lista do conteudo do cabeçalho.
     * @var array $coluns 
     */
    protected $coluns;
    
    /**
     * com a lista do conteudo da linha.
     * @var array $data 
     */
    protected $data;
    
    /**
     * valor numero da coluna que vai ter os botões para edição.
     * @var int $editLine 
     */
    protected $editLine;
    
    /**
     * com a lista do conteudo do rodapé.
     * @var array $foot 
     */
    protected $foot;
    
    /**
     * Colocar uma função para substituir a função de edição padrão.
     * @var lambda
     */
    protected $funcEdit;

    /**
     * Metodo chamado pela view ao executar esta classe Table
     * @param string $acao metodo a executado
     * @param string $options para os metodos simples
     * @param array  $options para os metodos com mais configuração
     */
    public function __invoke($options = null) {
        if($options){
            $this->openTable($options);
        }
        return $this;   
    }
    
    /**
     * Devido a um erro de execução que diz que a classe nao pode ser convertida em string
     * Colocando esse metodo o erro some
     * @return string
     */
    public function __toString() {
        return 'Application\View\Helper\Table';
    }

    /**
     * Abre a tag table com opções default ou opções passadas por parametro.
     * @param array $options
     */
    public function openTable($options) {
        if($options === TRUE){
            echo '<div class="resp-table"><table class="table table-striped table-bordered table-hover table-condensed">' , PHP_EOL;
            return;
        }
        if(is_string($options)){
            echo '<div class="resp-table"><table class="table table-striped table-bordered table-hover table-condensed ' . $options . '">' , PHP_EOL;                
            return;
        }
        if(is_array($options)){
            echo '<div class="resp-table"><table';  
            foreach ($options as $atributo => $value) {
                echo ' ', $atributo, '="', $value, '"';
            }            
            echo '>';  
            return;
        }
        echo '<div class="resp-table"><table>', PHP_EOL;  
    }

    /**
     * Renderiza o cabeçalho e configura classe para proximas chamadas
     * @param array $options
     * @return caso não for passado um array com coluns
     */
    public function renderThead(Array $coluns, $trOption = '', $css = [], $js = []) {
        $this->coluns = $coluns;
        echo "<thead class='th'>", PHP_EOL,
        "<tr ", $trOption, ">", PHP_EOL;
        foreach ($this->coluns as $key => $value) {
            $opt = (isset($trOption[$key])) ? ' ' . $trOption[$key]         : '';
            $lnk = (isset($css[$key]))      ? ' class="' . $css[$key] . '"' : '';
            $eve = (isset($js[$key]))       ? ' ' . $js[$key]               : '';
            echo "\t", '<th', $opt, $lnk, $eve, '>', $value, '</th>', PHP_EOL;
        }
        echo "</tr>", PHP_EOL,
        "</thead>", PHP_EOL,
        "<tbody>", PHP_EOL;
        if(!$this->editLine){            
            $this->setEditLine('last');
        }
    }

    /**
     * Renderiza a linha com os dados
     * Faz sterilização dos td conforme parametros se houver
     * Monta td para edição dos registro na posição configurada
     * @param array $options
     */
    public function renderLine(Array $data, $trOpt = '') {
        echo "<tr ", ((!empty($trOpt)) ? $trOpt : ''), ">", PHP_EOL;
        $this->data = $data;
        foreach ($this->data as $key => $value) {
            if($key == $this->editLine){
                $this->renderEditLine($value,$data);
                continue;
            }
            $td = (isset($this->tdopt[$key]))?$this->tdopt[$key]:'';
            echo "\t<td ", $td, ">", $value, "</td>", PHP_EOL;
        }
        echo "</tr>", PHP_EOL;
    }

    /**
     * Renderiza rodape da tabela conforme dados do array
     * @param array $options
     */
    public function renderTfoot(array $data,array $options= []) {
        $this->foot = $data;
        echo     "</tbody>",PHP_EOL
                ,"<tfoot>",PHP_EOL
                ,"<tr>", PHP_EOL;        
        foreach ($this->foot as $key => $value) {
            $td  = (isset($this->tdopt[$key]))?$this->tdopt[$key] . ' ':'';
            $css = (isset($options[$key]))    ?$options[$key]. ' '     :'';        
            echo "\t<td ", $td, $css, ">", $value, "</td>", PHP_EOL;
        }        
        echo "<tr>",PHP_EOL
                ,"</tfoot>", PHP_EOL;
    }

    /**
     * Renderiza td com botões para editar ou deletar registro
     * @param string $value
     */
    public function renderEditLine($value, &$data) {        
        if (is_callable($this->funcEdit)) {
            $lambda = $this->funcEdit;
            $lambda($value, $data);
            return;
        }
        echo "\t<td nowrap>",
                '<span class="hand" onClick="edit(\'', $value, '\')" title="Editar"><i class="fa fa-pencil"></i> Edit','</span>&nbsp;', PHP_EOL,
                '<span class="hand" onClick="del(\'', $value, '\')" title="Deletar"><i class="fa fa-remove"></i> Del</span>',
             "</td>", PHP_EOL;   
    }

    /**
     * Fecha a tag table 
     * Se tiver um rodape apenas fecha table
     * @param string $options
     */
    public function renderCloseTable() {
        if ($this->foot) {
            echo "</table></div>", PHP_EOL;
        } else {
            echo "</tbody>\n</table></div>", PHP_EOL;
        }
    }

    /**
     * Renderiza a tag caption da tabela
     * @param string $options
     */
    public function renderCaption($options) {
        echo "\t<caption>",
                $options,
             "</caption>";
    }

    /**
     * configura o td de edição do registro 
     * Retorna um int
     * @param string $option
     * @return int
     */
    public function setEditLine($option) {
        switch ($option) {
            case 'first':
                $this->editLine = 0;
                break;
            case 'last':
                $this->editLine =  (count($this->coluns) - 1 );
                break;
            case 'false':
                $this->editLine =  FALSE;
                break;
            default:
                $this->editLine =  $option;
        }
    }
    
    /**
     * Recebe um função lambda para rescrever a funcão de editar e deletar padrão.
     * @param function $lambda
     */
    public function setLambda($lambda) {
        $this->funcEdit = $lambda;
    }
    
    /**
     * Colocar opção que seram inseridas no td para cada linha de registro
     * @param array $options
     */
    public function setTdopt(array $options) {
        $this->tdopt = $options;
    }

}