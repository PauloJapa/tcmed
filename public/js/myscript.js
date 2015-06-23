var $play;

//Método que irá substituir o GLOBALSIS
var settings = {
    ola: "mundo"
};

/**
 * Centralizador de erros 
 * 
 * @type type
 */
var warn = {
    serverNotFound: function (server) {
        var error = "Servidor '" + server + "' não pode ser localizado!:"
                + " Verifique o endereco do servidor";
        console.error(error);
    }
};

/**
 * 
 * 
 * @returns {undefined}
 */
var loader = function (mode) {
    if ($(".loader").html() === undefined) {
        $("body").append('<i class="loader fa fa-3x fa-spinner fa-spin"></i>');
        $(".loader").css({
            position: "absolute",
            left: "50%",
            top: "50%"
        });
    }

    if (mode) {
        $(".loader").show();
    } else {
        $(".loader").hide();
    }
}
;

/**
 * Transforma os campos de um formulario em objeto
 * (para quem acessa de dentro da classe)
 * 
 * @param {type} form
 * @returns {play.transformFormToObject@pro;value|String}
 */
var transformFormToObject = function (form) {
    var aux = {};

    var form = $(form).serializeArray();

    $.each(form, function () {
        aux[this.name] = this.value || '';
    });
    return aux;
};

/**
 * Request data to server
 * 
 * type: [POST, GET, '']
 * url: [ip/hostname:port]
 * data: [data to send/receive]
 * 
 * @returns {undefined}
 */
var requestServer = function (arg) {
    arg.url = settings.path + arg.url; //Adiciona dir (se houver) 
    arg.url = arg.url + "?ajax=ok&";  //Trata erro de ajax

    if (arg.type !== "POST") {
        arg.type = "GET";
        arg.url = arg.url + "?ajax=ok&" + Math.ceil(Math.random() * 100000);
    }

    return $.ajax(arg)
            .fail(function () {
                warn.serverNotFound(arg.url);
            });
};


/**
 * Método de envio/recebimento de dados para o servidor
 * 
 * @param {type} obj
 * @returns {undefined}
 */
var processa = function (obj) {
    if (obj.url === "" || obj.url === "#") {
        return;
    }

    //Verifica se há o param ret. Se não há, seta o default
    obj.ret = (obj.ret) ? obj.ret : settings.defReturn;

    modules.Pagination.savePage();

    var ret = requestServer({
        url: settings.path + obj.url,
        data: transformFormToObject($("#" + obj.frm)),
        type: "POST"
    }).done(function (data) {
        $(obj.ret).html(data);
        
    }).complete(function () {
        loader(false); //Desliga o loader
        modules.Pagination.addPage();
        
    });
}
;

/**
 * Transform lower case to upper case
 * 
 * @returns {undefined}
 */
$.fn.toUp = function () {
    $(this).val($(this).val().toUpperCase());
};

/**
 * 
 * @returns {undefined}
 */
var events = function () {
    //defaultPrevented

    // Limpar campos da tela
    $(document).on('click', '.clean', function (e) {
        e.defaultPrevented;

        var obj = $(this).parent().parent();

        obj.find('input[type=text]').val('').focus();
        obj.find('textarea').val('').focus();
        obj.find('input[type=checkbox]').removeAttr('checked').focus();
        obj.find('input[type=radio]').removeAttr('checked').focus();
        var select = obj.find('select');
        if (select) {
            select.val(jQuery('options:first', select).val()).focus();
        }
    });

    // Evita que Acidentalmente a tecla backspace execute a função voltar do navegador
    $(document).bind("keydown keypress", function (e) {
        var preventKeyPress;

        var rx = /INPUT|TEXTAREA/i;
        var rxT = /RADIO|CHECKBOX|SUBMIT/i;

        if (e.keyCode === 8) {
            var d = e.srcElement || e.target;
            if (rx.test(e.target.tagName)) {
                var preventPressBasedOnType = false;
                if (d.attributes["type"]) {
                    preventPressBasedOnType = rxT.test(d.attributes["type"].value);
                }
                preventKeyPress = d.readOnly || d.disabled || preventPressBasedOnType;
            } else {
                preventKeyPress = true;
            }
        } else {
            preventKeyPress = false;
        }

        if (preventKeyPress)
            e.defaultPrevented;
    });
};

/**
 *
 *  
 * @param {type} options
 * @returns {Generator}
 */
var Generator = function (options) {
    //Configuracoes defaults
    var defaults = {
        defReturn: "#inter", //Div de retorno do ajax (processa)
        path: ""
    };

    settings = $.extend({}, options, defaults);
    settings = $.extend({}, options, settings);

    this.init();
};

/**
 * Public functions
 * 
 * @type type
 */
Generator.prototype = {
    init: function () {
    }
};


$(function () {
    var gen = new Generator({
        pagination: true
    });

    //Inicializador do Pagination
    modules.Pagination.init();
});

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

function toUp(o) {
    console.warn("funçao toUp() deve ser modificada por $(elemento).toUp() ou $.toUp(elemento)");
    o.value = o.value.toUpperCase();
}

function toTab(o, e) {

}

// Modificar a tecla enter para tab e 
// Verificar se tem função a ser executada
function changeEnterToTab(obj, e) {
    var keycode;
    if (window.event) {
        keycode = window.event.keyCode;
    } else if (e) {
        keycode = e.which;
    } else {
        return true;
    }
    if ((keycode == 13) || (keycode == 9)) {
        pressEnterOrTab(obj, e);
    }
    if (keycode == 9) {
        nextFocus(obj);
        pressTab(obj, e);
        return false;
    }
    if (keycode == 13) {
        nextFocus(obj);
        pressEnter(obj, e);
        return false;
    }
    return true;
}
//FUNCAO PARA SER SOBREESCRITA SE NECESSARIO
function pressEnterOrTab(obj, e) {
    return true;
}
//FUNCAO PARA SER SOBREESCRITA SE NECESSARIO
function pressEnter(obj, e) {
    return true;
}
//FUNCAO PARA SER SOBREESCRITA SE NECESSARIO
function pressTab(obj, e) {
    return true;
}
function nextFocus(obj) {
    var inputs = $(obj).closest('form').find(':input:visible');
    var ind = inputs.index(obj);
    var i = 1;
    var flag = true;
    while (flag) {
        ele = inputs.eq(ind + i);
        tp = ele.prop('type');
        if (ele.prop('disabled')) {
            i++;
        } else {
            switch (tp) {
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
    cp = campo.value;
    return cp;
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

function setInputDisabledMulti(name) {
    var inp = document.getElementsByName(name);
    for (i = 0; i < inp.length; i++) {
        inp[i].disabled = true;
    }
}

function retira_acentos(palavra) {
    com_acento = 'áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ';
    sem_acento = 'aaaaaeeeeiiiiooooouuuucAAAAAEEEEIIIIOOOOOUUUUC';
    nova = '';
    for (i = 0; i < palavra.length; i++) {
        if (com_acento.search(palavra.substr(i, 1)) >= 0) {
            nova += sem_acento.substr(com_acento.search(palavra.substr(i, 1)), 1);
        } else {
            nova += palavra.substr(i, 1);
        }
    }
    return nova;
}
// verifica se o valor esta no array
function in_Array(array, vlr) {
    for (key in array) {
        if (array[key] == vlr) {
            return true;
        }
    }
    return false;
}
 