var GLOBALSIS = {
    path: "",
    canClick: true,
    timeOutButton: 30000,
    fila: {
        first: 0,
        last: 9,
        cursor: 0,
        virtualCursor: 0
    },
    navegacao: {}
};

function setGlobal(key, vlr) {
    GLOBALSIS[key] = vlr;
}

function getGlobal(key) {
    try{
        return GLOBALSIS[key];        
    }catch(e){
        return false;
    }
}

var $play;

$(function () {

    $play = new play();

    $play.init({
        pagin: {
            back: ".godown",
            next: ".goup",
            menu: "#side-menu",
        },
        sender: {},
        loader: {},
        mailbox: {},
        //messenger: {}
    });
    
    $play.addMail({
       name: "danilo",
       date: "05/06/2015",
       content: "Olá, Jaime! como você vai?"
    });
    
    $play.addMail({
       name: "Paulo",
       date: "05/06/2015",
       content: "Olá, Jaime! como você vai?"
    });
    
    $play.addMail({
       name: "Miriam",
       date: "05/06/2015",
       content: "Este é um teste?"
    });
    
    $play.getMails();

    $(document).on("click", "#bot", function () {
        var inputs = JSON.stringify($play.getInputsForm($("#inter").find("form")));
        alert(inputs);
    });
    

    // Visualizar Calendario do Date Picker
    var obj = {
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        language: "pt-BR",
        forceParse: false,
        autoclose: true,
        todayHighlight: true
    };
    $('.date').find('input').datepicker(obj);
    $('.calendar').datepicker(obj);
    // Limpar campos da tela
    $(document).on('click','.clean',function(){  
       var obj = $(this).parent().parent();
       obj.find('input[type=text]').val('').focus();
       obj.find('textarea').val('').focus();
       obj.find('input[type=checkbox]').removeAttr('checked').focus();
       obj.find('input[type=radio]').removeAttr('checked').focus();
       var select = obj.find('select');
       if(select){
           select.val(jQuery('options:first',select).val()).focus();               
       }
    });

    // Evita que Acidentalmente a tecla backspace execute a função voltar do navegador
    var rx = /INPUT|TEXTAREA/i;
    var rxT = /RADIO|CHECKBOX|SUBMIT/i;
    $(document).bind("keydown keypress", function (e) {
        var preventKeyPress;
        if (e.keyCode == 8) {
            var d = e.srcElement || e.target;
            if (rx.test(e.target.tagName)) {
                var preventPressBasedOnType = false;
                if (d.attributes["type"]) {
                    preventPressBasedOnType = rxT.test(d.attributes["type"].value);
                }
                preventKeyPress = d.readOnly || d.disabled || preventPressBasedOnType;
            } else {preventKeyPress = true;}
        } else { preventKeyPress = false; }

        if (preventKeyPress) e.preventDefault();
    });

});

/**
 * Método de envio/recebimento de dados para o servidor
 * 
 * @param {type} obj
 * @returns {undefined}
 */
function processa(obj) {
    if (obj.url == "" || obj.url == "#") {
        return;
    }
    if (!GLOBALSIS.canClick) {
        return;
    }

    //Verifica se há o param ret. Se não há, seta como inter
    obj.ret = (!obj.ret) ? "inter" : obj.ret;

    $play.showLoader(true);
    $play.savePage();

    var ajax = $play.sendToServer(obj);

    //Conexão falhou
    ajax.fail(function (data, status, erro) {
        alert("Não foi possível enviar requisição para o servidor: ");
    });

    //Conexão sucedida
    ajax.done(function (data) {
        if (obj.ret) {
            var data = $("#" + obj.ret).html(data);

        }
    });

    //Completa a requisição se for sucedida ou não
    ajax.complete(function () {
        $play.showLoader(false);  //Desabilita gif de carregamento
        $play.addPage();
    });
}

function saveForm(buttonEle) {
    if (buttonEle) {
        var frm = getFormName(buttonEle);
        var act = getFormAction(buttonEle);
        if (isValid()) {
            eval(attachmentParamInAction(act, 'frm', frm));
        }
    } else {
        alert('Botão sem formulario.');
    }
    return false;
}

function attachmentParamInAction(act, key, vlr) {
    var ind = act.indexOf('})');
    return act.substr(0, ind) + "," + key + ":'" + vlr + "'" + act.substr(ind);
}

function getFormName(obj) {
    return getAtrrFromForm(obj, 'name');
}

function getFormAction(obj) {
    return getAtrrFromForm(obj, 'action');
}

function getAtrrFromForm(obj, atr) {
    return getAtrrFromParentTag(obj, 'form', atr);
}

function getAtrrFromParentTag(obj, tag, atr) {
    return $(obj).closest(tag).attr(atr);
}

    
function toUp(o){
    o.value = o.value.toUpperCase();
}

function toTab(o,e){

}    
    
// Modificar a tecla enter para tab e 
// Verificar se tem função a ser executada
function changeEnterToTab(obj,e){
    var keycode;
    if (window.event){ 
        keycode = window.event.keyCode;
    }else if (e){ 
        keycode = e.which;
    }else{
        return true;
    } 
    if((keycode == 13)||(keycode == 9)){
        pressEnterOrTab(obj,e);
    }
    if(keycode == 9){
        nextFocus(obj);
        pressTab(obj,e);
        return false;
    }
    if(keycode == 13){
        nextFocus(obj);
        pressEnter(obj,e);
        return false;
    }
    return true;
}
//FUNCAO PARA SER SOBREESCRITA SE NECESSARIO
function pressEnterOrTab(obj,e){
    return true;
}
//FUNCAO PARA SER SOBREESCRITA SE NECESSARIO
function pressEnter(obj,e){
    return true;
}
//FUNCAO PARA SER SOBREESCRITA SE NECESSARIO
function pressTab(obj,e){
    return true;
}
function nextFocus(obj){
    var inputs = $(obj).closest('form').find(':input:visible');
    var ind    = inputs.index(obj);
    var i      = 1;
    var flag   = true;
    while(flag){
        ele = inputs.eq(ind + i);
        tp = ele.prop('type');
        if(ele.prop('disabled')){
            i++;
        }else{
            switch(tp){
                case 'button':  
                    i++;
                    break;  
                default:    
                    ele.focus();
                    flag = false;          
            }
        }
    }
    return;
}
// FIM Modificar a tecla enter para tab e 

// Formata data no padrão DDMMAAAA
function formataData(campo) {
    campo.value = filtraCampo(campo);
    var vr = LimparMoeda(campo.value, "0123456789");
    tam = vr.length;
    if (tam <= 1)
        campo.value = vr;
    if (tam > 2 && tam < 5)
        campo.value = vr.substr(0, tam - 2) + '/' + vr.substr(tam - 2, tam);
    if (tam >= 5 && tam <= 10)
        campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2) + '/' + vr.substr(4, 4);
}

// limpa todos os caracteres especiais do campo solicitado
function filtraCampo(campo) {
    var s = "";
    var cp = "";
    vr = campo.value;
    tam = vr.length;
    for (i = 0; i < tam; i++) {
        if (vr.substring(i, i + 1) != "/" && vr.substring(i, i + 1) != "-" && vr.substring(i, i + 1) != "." && vr.substring(i, i + 1) != ",") {
            s = s + vr.substring(i, i + 1);
        }
    }
    campo.value = s;
    cp = campo.value ;
    return cp ;
}

// retira caracteres invalidos da string
function LimparMoeda(valor, validos) {
    var result = "";
    var aux;
    for (var i = 0; i < valor.length; i++) {
        aux = validos.indexOf(valor.substring(i, i + 1));
        if (aux >= 0) {
            result += aux;
        }
    }
    return result;
}

function setInputDisabledMulti(name){
    var inp = document.getElementsByName(name);
    for(i=0; i<inp.length; i++){
        inp[i].disabled = true;
    }
}

function retira_acentos(palavra) {
    com_acento = 'áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ';
    sem_acento = 'aaaaaeeeeiiiiooooouuuucAAAAAEEEEIIIIOOOOOUUUUC';
    nova='';
    for(i=0;i<palavra.length;i++) {
        if (com_acento.search(palavra.substr(i,1))>=0) {
            nova+=sem_acento.substr(com_acento.search(palavra.substr(i,1)),1);
        }else{
            nova+=palavra.substr(i,1);
        }
    }
    return nova;
}
// verifica se o valor esta no array
function in_Array(array,vlr){
    for (key in array) {
        if (array[key] == vlr) {
            return true;
        }
    }
    return false ;
}
 