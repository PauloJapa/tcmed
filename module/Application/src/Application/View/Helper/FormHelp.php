<?php

namespace Application\View\Helper;

use Zend\Form\View\Helper\AbstractHelper;

/**
 * FormHelp
 * View Helper para trabalhar com formularios
 * @author Paulo Cordeiro Watakabe <watakabe05@gmail.com>
 */
class FormHelp extends AbstractHelper {

    /**
     *
     * @var \Zend\Form\View\Helper\Form
     */
    protected $formView;

    /**
     *
     * @var \Zend\Form
     */
    protected $form;

    /**
     * Contem as tags html para exibição dos erros
     * @var string
     */
    protected $inputError;

    /**
     *
     * @var \Zend\Form\View\Helper\FormElementErrors 
     */
    protected $formEleErro;

    /**
     *
     * @var \Zend\Form\View\Helper\FormLabel
     */
    protected $label;

    /**
     *
     * @var \Zend\Form\View\Helper\FormRadio
     */
    protected $radio;

    /**
     *
     * @var \Zend\Form\View\Helper\FormCheckbox
     */
    protected $checkbox;

    /**
     *
     * @var \Zend\Form\View\Helper\FormMultiCheckbox
     */
    protected $multiCheckbox;

    /**
     * Define se label e input vai ser na mesma linha ou não 
     * Padrão é label acima
     * @var boolean 
     */
    protected $horizontal = false;

    /**
     * Tamanho padrao de largura boostrap maximo 12
     * @var int 
     */
    protected $colLarg = 12;

    /**
     * Metodo magico que é acionado quando acessado esta classe pela view
     * Configura as variaveis e direciona para o metodo requerido
     * @param Zend\Form\View\Helper $formView
     * @param Zend\Form $form
     * @param array $options
     * @param array $acao
     */
    public function __invoke($formView, $form = null, $target = '') {
        $this->formView = $formView;
        if (!is_null($form)) {
            $this->setForm($form, $target);
        }
        return $this;
    }

    /**
     * Devido a um erro de execução que diz que a classe nao pode ser convertida em string
     * Colocando esse metodo o erro some
     * @return string
     */
    public function __toString() {
        return 'Application\View\Helper\FormHelp';
    }

    /**
     * Facilitar a chamada dos metodos para exibir os input individualmente
     * 
     * @param string $m
     * @param array $p
     */
    public function __call($m, $p) {
        $func = 'renderInput' . ucfirst($m);
        if (method_exists($this, $func)) {
            return call_user_func_array([$this, $func], $p);
        }
    }

    /**
     * Setar Form a ser trabalho no FormHelp
     * Caso exitir o target faz a configuração
     * @param objeto $form
     * @param string $target
     */
    public function setForm($form, $target = '') {
        $this->form = $form;
        if (!empty($target)) {
            $this->form->setAttribute('action', $target);
        }
        $this->form->prepare();
    }

    /**
     * Renderiza o inicio do form e a parte do fieldset  e inicio do table 
     * para organizar o formulario em colunas recebe no options legend e um input hidden se houver
     * @param Array $options 
     */
    public function formInit($legend = '', $options = []) {
        echo $this->formView->form()->openTag($this->form),
        $this->renderFieldsetIni($legend, $options);
    }

    /**
     * Renderiza o fim do fieldset, table e form
     * Não renderiza o fim do fieldset e table se for definido noField nas opções
     * Coloca o botao submit se requerido
     * @param Array $options
     */
    public function formEnd($options = []) {
        if (!isset($options['noField'])) {
            echo $this->renderFieldsetFim($options);
        } else {
            if (isset($options['submit'])) {
                $this->renderInputSubmit($options['submit']);
            }
        }
        echo $this->formView->form()->closeTag(), PHP_EOL;
    }

    /**
     * Renderiza o inicio do fieldset  e inicio do table 
     * para organizar o formulario em colunas 
     * Recebe no options legend e um input hidden se houver
     * @param Array $options 
     */
    public function renderFieldsetIni($legend = '', array $options = []) {
        $legenda = (!empty($legend)) ? '<legend>' . $legend . '</legend>' . PHP_EOL : '';
        echo "<fieldset>", PHP_EOL, $legenda;
        $this->renderAllHidden();
        if (isset($options['beforeLine'])) {
            echo $options['beforeLine'];
        }
        $this->openLine();
    }

    /**
     * Renderiza o fim do fieldset, table
     * Coloca o botao submit se requerido
     * @param Array $options
     */
    public function renderFieldsetFim($options) {
        if (isset($options['afterTable'])) {
            echo $options['afterTable'];
        }
        echo "</fieldset>", PHP_EOL;
        if (isset($options['submit'])) {
            $this->renderInputSubmit($options['submit']);
        }
    }

    public function renderAllHidden() {
        /* @var $value \Zend\Form\Element */
        $eles = $this->form->getElements();
        foreach ($eles as $key => $value) {
            if ($value->getAttribute('type') == 'hidden') {
                $this->renderInputHidden($key);
            }
        }
    }

    public function openLine() {
        echo '<div class="row">', PHP_EOL;
        return $this;
    }

    public function closeLine() {
        echo '</div>', PHP_EOL;
        return $this;
    }

    public function lineDown() {
        $this->closeLine();
        $this->openLine();
        return $this;
    }

    public function openCol($tamanho = '3') {
        $this->colLarg = $tamanho;
        echo '<div class="col-md-', $tamanho, '">', PHP_EOL;
        return $this;
    }

    public function closeCol() {
        echo '</div>', PHP_EOL;
        return $this;
    }

    /**
     * Baseado na largura da div do boostrap que vai ate 12
     * Faz um redimencionamento para o Label do campo horizontal não ficar estreito
     *      * @return string
     */
    public function getLargForLabelHorizontal() {
        switch (true) {
            case $this->colLarg >= 10 AND $this->colLarg <= 12:
                return '2';
            case $this->colLarg >= 7 AND $this->colLarg <= 9:
                return '3';
            case $this->colLarg >= 4 AND $this->colLarg <= 6:
                return '4';
            case $this->colLarg >= 1 AND $this->colLarg <= 3:
                return '5';
            default:
                return '2';
        }
    }

    public function openDivInput($name, &$element, $css = '', $setFormControl = true, $opt = []) {
        if (is_array($css)) {
            $opt = $css;
            $css = '';
        }
        $this->inputError = $this->getEleErro()->render($element);
        if ($this->inputError) {
            $css .= ' has-error';
        }
        if ($setFormControl) {
            $element->setAttribute('class', 'form-control' . (($css == ' date') ? '' : $css));
        }
        if ($this->horizontal) {
            $element->setLabelAttributes(['class' => 'col-md-' . $this->getLargForLabelHorizontal() . ' control-label']);
        }
        if (isset($opt['spanLabel'])) {
            if ($opt['spanLabel']) {
                return
                        '<div class="form-group" id="pop' . $name . '">' . PHP_EOL .
                        '<div class="input-group' . $css . '">' .
                        '<span class="input-group-addon">' . $element->getLabel() . '</span>';
            }
            return
                    '<div class="form-group" id="pop' . $name . '">' . PHP_EOL .
                    '<div class="input-group' . $css . '">';
        }
        return
                '<div class="form-group" id="pop' . $name . '">' . PHP_EOL .
                $this->getLabel()->openTag($element) . $element->getLabel() . $this->getLabel()->closeTag() .
                '<div class="input-group' . $css . '">';
    }

    public function closeDivInput() {
        return
                "</div>" . PHP_EOL .
                "</div>" . PHP_EOL;
    }

    public function getEle($name = '') {
        if (empty($name)) {
            echo '<h1>Erro parametro name vazio<h1>';
            die;
        }
        $element = $this->form->get($name);
        if (!$element) {
            echo '<h1>Erro ao tentar carregar input= ' . $name . ' talvez não exista no form passado';
            die;
        }
        return $element;
    }

    public function getLabel() {
        if ($this->label) {
            return $this->label;
        }
        $this->label = $this->formView->formLabel();
        return $this->label;
    }

    public function getCheckbox() {
        if ($this->checkbox) {
            return $this->checkbox;
        }
        $this->checkbox = $this->formView->formCheckbox();
        return $this->checkbox;
    }

    /**
     * 
     * @return \Zend\Form\View\Helper\FormMultiCheckbox
     */
    public function getMultiCheckbox() {
        if ($this->multiCheckbox) {
            return $this->multiCheckbox;
        }
        $this->multiCheckbox = $this->formView->formMultiCheckbox();
        if ($this->horizontal) {
            $this->multiCheckbox->setSeparator(' | ');
        } else {
            $this->multiCheckbox->setSeparator('<br>');
        }
        return $this->multiCheckbox;
    }

    public function getRadio() {
        if ($this->radio) {
            return $this->radio;
        }
        $this->radio = $this->formView->formRadio();
        if ($this->horizontal) {
            $this->radio->setSeparator(' | ');
        } else {
            $this->radio->setSeparator('<br>');
        }
        return $this->radio;
    }

    function setHorizontal($horizontal) {
        $this->horizontal = $horizontal;
        return $this;
    }

    public function getEleErro() {
        if ($this->formEleErro) {
            return $this->formEleErro;
        }
        $this->formEleErro = $this->formView->formElementErrors();
        $this->formEleErro
                ->setMessageOpenFormat('<div class="alert alert-danger" role="alert">')
                ->setMessageSeparatorString('</div><div class="alert alert-danger" role="alert">')
                ->setMessageCloseString('</div>');
        return $this->formEleErro;
    }

    /**
     * Exibição de erro padrão boostrap 3 
     */
    public function showError() {
        if ($this->inputError) {
            echo $this->inputError, PHP_EOL;
            $this->inputError = false;
        }
    }

    /**
     * Elemento
     * 
     * @author Danilo Dorotheu
     * @version 1.0
     * @param String $element Nome do elemento (DOM)
     * @param array $attr Atributos do elemento
     * -> key => value
     * @param String $content Valor do elemento
     * @return string
     */
    public function element($element, $attr, $content = "") {
        if (!isset($element) or ! isset($attr)) {
            return "";
        }
        $aux = "";
        foreach ($attr as $key => $value) {
            $aux .= " " . $key . "=\"" . $value . "\"";
        }
        return "<" . $element . $aux . ">" . $content . "</" . $element . ">";
    }

    /**
     * Gerador de Botao
     * 
     * @author Danilo Dorotheu
     * @version 1.0
     * @param array $attr Atributos do botao (Pode ser Omitido)
     * @param type $content Conteudo do botao
     * @param type $extraClass Classes extras do elemento (Pode ser Omitido)
     * @param type $type Cor do botao [primary|danger|...] (Pode ser Omitido)
     * @return String
     */
    public function buildButton($attr, $content, $extraClass = "", $type = "default") {
        //Define as classes do botao
        $attr["class"] = "btn btn-" . $type . " " . $extraClass;
        //Define (ou sobrescreve) o tipo do botao (button)
        $attr["type"] = (isset($attr["type"])) ? $attr["type"] : "button";
        //Gera e devolve o elemento
        return $this->element("button", $attr, $content);
    }

    /**
     * Gerador de Span
     * 
     * @author Danilo Dorotheu
     * @version 1.0
     * @param array $attr Atributos do Span
     * @param type $content Conteudo do Spano
     * @return String
     */
    public function buildSpan($attr, $content = "") {
        //Gera e devolve o elemento
        return $this->element("span", $attr, $content);
    }

    /**
     * Gerador de Icone
     * 
     * @author Danilo Dorotheu
     * @version 1.0
     * @param String $icon Icone
     * @return String
     */
    public function buildIcon($icon) {
        //Se não passar o icone, devolve vazio
        if (!isset($icon)) {
            return "";
        }
        //Gera a classe do icone
        $attr["class"] = "fa fa-" . $icon;
        //Gera e retorna o elemento
        return $this->element("i", $attr);
    }

    public function buildDropdown($list, $attr, $buttonParams, $firstVal) {
        $firstVal = (isset($firstVal)) ? $firstVal : $list[0];
        $attr["id"] = (isset($attr["id"])) ? $attr["id"] : "drop";

        $a = "";
        foreach ($list as $value) {
            $a .= $this->element("a", [], $value);
        }
        $li = $this->element("li", [], $a);

        $ul = $this->element("ul", ["class" => "dropdown-menu", "aria-labelledby" => $attr["id"]], $li);

        $span = $this->buildSpan(["class" => "caret"]);

        $button = $this->buildButton([
            "id" => $attr["id"],
            "data-toggle" => "dropdown",
            "aria-haspopup" => "true",
            "aria-expanded" => "false"
                ], $firstVal . $span, $buttonParams["extraClass"], $buttonParams["type"]);

        return $this->element("div", [], $button . $ul);
    }

    /**
     * Renderiza o botao de limpar campo Input
     * 
     * @param type $name Id do Elemento
     * @param type $element Elemento
     * @param array $options Opcoes definidas no ato de construcao do elemento
     * @return String
     * 
     * @author Paulo Watakabe
     * @author Danilo Dorotheu (Modificacoes)
     * @version 1.4
     */
    public function iconClean($name, &$element, $options) {
        if (isset($options["clean"]) and ! $options["clean"]) {
            return ""; //Se for falso, retorne ""
        }

        $jq = ' clean'; // Classe css que faz ligação com a função cleaninput criada em myscript.js

        if ($element->getAttribute('readOnly')) {
            $jq = '';
        }
        if ($element->getAttribute('disabled')) {
            $jq = '';
        }
        $middle = "";
        if ((isset($options["extra"]) and ! empty($options["extra"]))) {
            $middle = ' middleButton';
        }
        //Gera botao (com icone)
        $button = $this->buildButton([], $this->buildIcon("remove"), $jq . $middle);
        //$button = $this->buildDropdown(["danilo", "joao"], [], ["extraClass"=>$middle,"type"=>"primary"], "");
        //Envolve o botao acima em um span e devolve
        return $this->buildSpan(["class" => "input-group-btn"], $button);
    }

    /**
     * Renderiza [botao | label] dentro do input
     * 
     * @param type $name Id do Elemento
     * @param array $options Opcoes do elemento:
     * -> String type: [button|span]
     * -> String text: Texto do elemento
     * -> String icon: Icone do elemento
     * -> String js: Funcao a ser executada dentro do onclick 
     * @return string
     * 
     * @see getIcons
     * @author Danilo Dorotheu 
     * @version 2.0
     */
    public function iconExtra($name, array $options) {
        //TODO: Mudar logica
        if (!(isset($options["extra"]) and ! empty($options["extra"]))) {
            return "";
        }

        $options = $options["extra"]; //Diminui o caminho
        //Recebe valores de options
        $type = (isset($options["type"])) ? $options["type"] : "label";
        $icon = (isset($options["icon"])) ? $options["icon"] : "";
        $text = (isset($options["text"])) ? $options["text"] : "";
        $js = (isset($options["js"])) ? $options["js"] : "";
        $content = "";

        //Define o tipo do input-group (addon | btn)
        $inputGroup = ($type == "label") ? "addon" : "btn";

        $content = $icon . $text;

        if ($type == "button") {
            $content = $this->button([
                "id" => "icon_" . $nome,
                "func" => $js,
                "text" => $text,
                "icon" => $icon
            ]);
        }
        return '<span class="input-group-' . $inputGroup . '">' . $content . '</span>';
    }

    public function teste($name, array $options) {
        //TODO: Mudar logica
        if (!(isset($options["extra"]) and ! empty($options["extra"]))) {
            return "";
        }

        $options = $options["extra"]; //Diminui o caminho
        
        $attr = (isset($options["attr"])) ? $options["attr"] : "";
        
        $type = (isset($options["type"])) ? $options["type"] : "label";
        $icon = (isset($options["icon"])) ? $options["icon"] : "";
        $text = (isset($options["text"])) ? $options["text"] : "";
        
        
    }

    public function getSpan($name, array $attributes = []) {
        if (empty($attributes) OR ! isset($attributes['span_id'])) {
            return '';
        }
        return '<span name="span_' . $name . '" id="' . $attributes['span_id'] . '" class="' . $attributes['class'] . '" style="' . $attributes['style'] . '"></span>';
    }

    public function iconCalend($name, &$element) {
        if ($element->getAttribute('readOnly')) {
            return '';
        }
        return '<span class="input-group-btn"><button class="btn btn-default calendar" fa-calendar" id="calend_' .
                $name . '" type="button"><i class="fa fa-calendar"></i></button></span>';
    }

    public function align($html_partial, $align = 'center') {
        return "<div align='" . $align . "'>" .
                $html_partial .
                "</div>" . PHP_EOL;
    }

    /**
     * Renderiza o gerador de botao
     * @param type $attr
     * @param type $content
     * @param type $extraClass
     * @param type $type
     * @return \Application\View\Helper\FormHelp
     */
    public function renderInputButton($attr, $content, $extraClass = "", $type = "primary") {
        echo $this->buildButton($attr, $content, $extraClass, $type);
        return $this;
    }

    /**
     * Renderiza o input hidden 
     * @param String $name
     */
    public function renderInputHidden($name) {
        echo $this->formView->formHidden($this->getEle($name)), PHP_EOL;
    }

    /**
     * Renderiza um input com botão de limpar e outro botão passado por parametro 
     * Caso exista o parametro span renderiza sua tag
     * 
     * @param string $name
     * @param array $options Obrigatorio para ser um campo com input
     * @param array $attributes
     * @return \Application\View\Helper\FormHelp
     */
    public function renderInputIcone($name, array $options, array $attributes = []) {
        return $this->renderInputText($name, $options, $attributes);
    }

    /**
     * Renderiza o input text com um botao para limpar o conteudo
     * Caso exista msg de erro sera exibo em vermelho
     * @param String $name
     * @param array $options
     * @param array $attributes
     * @return \Application\View\Helper\FormHelp
     */
    public function renderInputText($name, array $options = [], array $attributes = []) {
        /* @var $element \Zend\Form\Element\Text */
        $element = $this->getEle($name);
        if (!empty($attributes)) {
            $element->setAttributes($attributes);
        }
        echo $this->openDivInput($name, $element, $options),
        $this->formView->formText($element),
        $this->iconClean($name, $element, $options),
        //$this->getIcons($name, $options),
        $this->iconExtra($name, $options),
        $this->closeDivInput();
        echo
        $this->getSpan($name, $options),
        $this->showError();
        return $this;
    }

    /**
     * Renderiza o input textArea com um botao para limpar o conteudo
     * Caso exista msg de erro sera exibo em vermelho
     * @param String $name
     * @param array $attributes
     * @return \Application\View\Helper\FormHelp
     */
    public function renderInputTextArea($name, array $attributes = []) {
        /* @var $element \Zend\Form\Element\TextArea */
        $element = $this->getEle($name);
        if (!empty($attributes)) {
            $element->setAttributes($attributes);
        }
        echo $this->openDivInput($name, $element),
        $this->formView->formTextarea($element),
        $this->iconClean($name, $element),
        $this->closeDivInput(),
        $this->showError();
        return $this;
    }

    /**
     * Renderiza e posiciona o input Submit na tela
     * @param String $name
     * @param String $pos    lefth = -1, center = 0, right = 1  default is center
     * @return \Application\View\Helper\FormHelp
     */
    public function renderInputSubmit($name, $pos = '0') {
        /* @var $element \Zend\Form\Element\Submit */
        $element = $this->getEle($name);
        switch ($pos) {
            case '1':
                echo $this->align($this->formView->formSubmit($element), 'right');
                break;
            case '-1':
                echo $this->align($this->formView->formSubmit($element), 'lefth');
                break;
            default:
                echo $this->align($this->formView->formSubmit($element));
        }
        return $this;
    }

    /**
     * Renderiza e posiciona o input button na tela
     * @param String $name
     * @param String $pos    lefth = -1, center = 0, right = 1  default is center
     * @return \Application\View\Helper\FormHelp
     */
    public function renderInputButtonOnly($name, $pos = '0') {
        /* @var $element \Zend\Form\Element\Button */
        $element = $this->getEle($name);
        switch ($pos) {
            case '1':
                echo $this->align($this->formView->formButton($element), 'right');
                break;
            case '-1':
                echo $this->align($this->formView->formButton($element), 'lefth');
                break;
            default:
                echo $this->align($this->formView->formButton($element));
        }
        return $this;
    }

    /**
     * Renderiza o input Selec
     * Caso exista msg de erro sera exibo em vermelho
     * @param String $name
     * @return \Application\View\Helper\FormHelp
     */
    public function renderInputSelect($name) {
        /* @var $element \Zend\Form\Element\Submit */
        $element = $this->getEle($name);
        $selectHtml = $this->openDivInput($name, $element);
        if ($element->getAttribute('disabled')) {
            $selectHtml .= '<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $element->getValue() . '">' . PHP_EOL;
        } else {
            $selectHtml .= $this->formView->formSelect($element);
        }
        echo
        $selectHtml,
        $this->iconClean($name, $element),
        $this->closeDivInput(),
        $this->showError();
        return $this;
    }

    /**
     * Renderiza o input text com um botao para limpar o conteudo e outro para 
     * escolher um data para o preencimento
     * Caso exista msg de erro sera exibo em vermelho
     * @param String $name
     * @return \Application\View\Helper\FormHelp
     */
    public function renderInputCalend($name) {
        /* @var $element \Zend\Form\Element\Text */
        $element = $this->getEle($name);
        echo $this->openDivInput($name, $element, ' date');
        $element->setAttribute('onmouseenter', 'loadCalend(this)');
        echo $this->formView->formText($element),
        $this->iconClean($name, $element),
        $this->iconCalend($name, $element),
        $this->closeDivInput(),
        PHP_EOL .
        '<script language="javascript">' .
        'var obj = {format: "dd/mm/yyyy", todayBtn: "linked", language: "pt-BR", forceParse: false, autoclose: true, todayHighlight: true};' .
        "$('.date').find('input').datepicker(obj);" .
        "$('.calendar').datepicker(obj);" .
        '</script>' .
        PHP_EOL .
        $this->showError();
        return $this;
    }

    /**
     * Renderiza o input password com um botao para limpar o conteudo
     * Caso exista msg de erro sera exibo em vermelho
     * @param String $name
     * @return \Application\View\Helper\FormHelp
     */
    public function renderInputPassword($name) {
        /* @var $element \Zend\Form\Element\Password */
        $element = $this->getEle($name);
        echo $this->openDivInput($name, $element, ' passwd'),
        $this->formView->formPassword($element),
        $this->iconClean($name, $element),
        $this->closeDivInput(),
        $this->showError();
        return $this;
    }

    /**
     * Renderiza o input text no estilo moeda com um botao para limpar o conteudo  
     * Adiciona js para mascara de moeda
     * Caso exista msg de erro sera exibo em vermelho
     * @param string $name    Nome do element form a ser renderizado
     * @param string $symbol  Para exibir ou não o simbolo da moeda
     * @param string $dec     Quantidade de casas decimais do campo
     * @return \Application\View\Helper\FormHelp
     */
    public function renderInputMoeda($name, $symbol = 'true', $dec = '2') {
        /* @var $element \Zend\Form\Element\Text */
        $element = $this->getEle($name);
        $element->setAttribute('style', 'text-align:right;');
        echo $this->openDivInput($name, $element, ' passwd'),
        $this->formView->formText($element),
        $this->iconClean($name, $element),
        $this->getMoedaMascara($name, $symbol, $dec),
        $this->closeDivInput(),
        $this->showError();
        return $this;
    }

    /**
     * Gera o script em jquery para inserir a mascara de moeda no campo
     * @param string $name    Nome do campo que vai ter a mascara
     * @param string $symbol  Para exibir ou não o simbolo da moeda
     * @param string $dec     Quantidade de casas decimais do campo
     * @return string 
     */
    public function getMoedaMascara($name, $symbol, $dec) {
        return PHP_EOL .
                '<script language="javascript">' .
                '$(function(){$("#' .
                $name .
                '").maskMoney({symbol:"R$ ", showSymbol:' .
                $symbol .
                ', thousands:".", decimal:",", symbolStay:true, precision:' .
                $dec .
                '});});' .
                '</script>' . PHP_EOL;
    }

    /**
     * Renderiza o input text no estilo float com um botao para limpar o conteudo  
     * Adiciona js para mascara de decimal
     * Caso exista msg de erro sera exibo em vermelho
     * @param String $name
     */
    public function renderInputFloat($name) {
        $this->renderInputMoeda($name, 'false');
    }

    /**
     * Renderiza o input text no estilo float com um botao para limpar o conteudo  
     * Adiciona js para mascara de 4 decimal
     * Caso exista msg de erro sera exibo em vermelho
     * @param String $name
     */
    public function renderInputFloat4($name) {
        $this->renderInputMoeda($name, 'false', '4');
    }

    /**
     * Renderiza o input text no estilo float com um botao para limpar o conteudo  
     * Adiciona js para mascara de 8 decimal
     * Caso exista msg de erro sera exibo em vermelho
     * @param String $name
     */
    public function renderInputFloat8($name) {
        $this->renderInputMoeda($name, 'false', '8');
    }

    /**
     * Renderiza o input Radio com um botao para limpar o conteudo
     * Caso exista msg de erro sera exibo em vermelho
     * @param type $name
     * @return \Application\View\Helper\FormHelp
     */
    public function renderInputRadio($name) {
        /* @var $element \Zend\Form\Element\Radio */
        $element = $this->getEle($name);
        echo $this->openDivInput($name, $element, '', FALSE);

        if ($element->getAttribute('disabled')) {
            $element->setDisableInArrayValidator(TRUE);
            echo '<input type="hidden" name="', $name, '" value="', $element->getValue(), '">';
        }
        if ($this->horizontal) {
            $element->setLabelAttributes(['class' => 'radio-inline']);
        }
        echo $this->getRadio()->render($element);
        echo
        $this->iconClean($name, $element),
        $this->closeDivInput(),
        $this->showError();
        return $this;
    }

    /**
     * Renderiza o input Checkbox com um botao para limpar o conteudo
     * Caso exista msg de erro sera exibo em vermelho
     * @param type $name
     * @return \Application\View\Helper\FormHelp
     */
    public function renderInputCheckbox($name) {
        /* @var $element \Zend\Form\Element\Checkbox */
        $element = $this->getEle($name);
        echo $this->openDivInput($name, $element, '', FALSE);

        if ($element->getAttribute('disabled')) {
            $element->setDisableInArrayValidator(TRUE);
            echo '<input type="hidden" name="', $name, '" value="', $element->getValue(), '">';
        }
        if ($this->horizontal) {
            $element->setLabelAttributes(['class' => 'checkbox-inline']);
        }
        echo $this->getCheckbox()->render($element);
        echo
        $this->iconClean($name, $element),
        $this->closeDivInput(),
        $this->showError();
        return $this;
    }

    /**
     * Renderiza o input Checkbox com um botao para limpar o conteudo
     * Caso exista msg de erro sera exibo em vermelho
     * @param type $name
     * @return \Application\View\Helper\FormHelp
     */
    public function renderInputMultiCheckbox($name) {
        /* @var $element \Zend\Form\Element\MultiCheckbox */
        $element = $this->getEle($name);
        echo $this->openDivInput($name, $element, '', FALSE);

        if ($element->getAttribute('disabled')) {
            $element->setDisableInArrayValidator(TRUE);
            echo '<input type="hidden" name="', $name, '" value="', $element->getValue(), '">';
        }
        if ($this->horizontal) {
            $element->setLabelAttributes(['class' => 'checkbox-inline']);
        }
        echo $this->getMultiCheckbox()->render($element);
        echo
        $this->iconClean($name, $element),
        $this->closeDivInput(),
        $this->showError();
        return $this;
    }

}
