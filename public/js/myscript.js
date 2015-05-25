var GLOBALSIS = {
    path: "app/",
    canClick: true,
    timeOutButton: 30000,
};

$(function () {
    $(document).on("click", "#bot", function () {
        alert(getInputsForm("#frm"));
    });
});


/**
 * Timeout de funcoes (delay)
 * @param {type} time
 * @param {type} funcao
 * @returns {initTimeOut.timeOut}
 */
function initTimeOut(time, funcao) {
    var timeOut = setTimeout(funcao, time);
    return timeOut;
}

/**
 * Transforma os inputs/selects do form em json 
 * @param {type} idDoForm
 * @returns {jQuery}
 */
getInputsForm = function (obj) {
    var o = {};

    var a = $(obj).serializeArray();

    $.each(a, function () {
        o[this.name] = this.value || '';
    });
    return JSON.stringify(o);
};

/**
 * Funcao de exibição do gif de carregamento
 * @param {type} visible
 * @returns {undefined}
 */
function showLoader(visible) {
    if (visible) {
        $("#loader").fadeIn("fast");
        lockClick();
    } else {
        $("#loader").fadeOut("fast");
        unlockClick();
    }
}

function lockClick(time) {
    GLOBALSIS.canClick = false;

    //Se for definido um tempo (time), seta timeout para o tempo definido
    //Se nao houver, seta o timeout com o default
    var timeout = (time) ? time : GLOBALSIS.timeOutButton;

    initTimeOut(timeout, function () {
        unlockClick();
    });
}

function unlockClick() {
    GLOBALSIS.canClick = true;
}

/**
 * 
 * Pegar uma instancia do ajax
 * @param obj {url:'url', (opt)frm:'form_func'}
 * @returns {AJAX}
 * 
 */
function initAjax(obj) {
    var params = {};

    if (obj.frm) { //Se houver dados para enviar
        params.data = getInputsForm(obj.frm);
        params.type = "POST";
        params.url = GLOBALSIS.path + obj.url;
    } else {
        params.type = "GET";
        params.url = GLOBALSIS.path + obj.url + "?" + Math.ceil(Math.random() * 100000)
    }

    return $.ajax(params);
}

/**
 * Método de envio/recebimento de dados para o servidor
 * @param {type} obj
 * @returns {undefined}
 */
function processa(obj) {
    if (!GLOBALSIS.canClick) {
        return;
    }

    showLoader(true);

    //Verifica se há o param ret. Se não há, seta como inter
    obj.ret = (!obj.ret) ? "inter" : obj.ret;

    var ajax = initAjax(obj);

    //Conexão falhou
    ajax.fail(function () {
        alert("Não foi possível enviar requisição para o servidor: \n" + obj.url);
    });

    //Conexão sucedida
    ajax.done(function (data) {
        if (obj.ret) {
            $("#" + obj.ret).html(data);
        }
    });

    //Completa a requisição se for sucedida ou não
    ajax.complete(function () {
        showLoader(false);
    });
}

function setGlobal(key, vlr) {
    GLOBALSIS[key] = vlr;
}

function getGlobal(key) {
    return GLOBALSIS[key];
}
