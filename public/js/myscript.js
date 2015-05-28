var GLOBALSIS = {
    path: "app/",
    canClick: true,
    timeOutButton: 30000,
    fila: {
        first: 0,
        last: 9,
        cursor: 0,
        virtualCursor:0,
    },
    navegacao:{},
};

$(function () {
    $(document).on("click", "#bot", function () {
        alert(getInputsForm("#frm"));
    });

    $play.managerPag($('.godown'), $('.goup'), $('#inter'));

//    $(document).on("click", ".go", function(){
//        if($(this).hasClass("goup")){
//            if(GLOBALSIS.fila.virtualCursor < GLOBALSIS.fila.cursor){
//                $("#inter").html(getSessionStorage(GLOBALSIS.fila.virtualCursor));
//                GLOBALSIS.fila.virtualCursor++;
//                alert(GLOBALSIS.fila.virtualCursor);
//            }
//        }else{
//            if(GLOBALSIS.fila.virtualCursor > GLOBALSIS.fila.first){
//                GLOBALSIS.fila.virtualCursor--;
//                $("#inter").html(getSessionStorage(GLOBALSIS.fila.virtualCursor));
//                alert(GLOBALSIS.fila.virtualCursor);
//            }
//        }
//    });
    
});

function addSessionStorage(data){
    //sessionStorage.setItem(GLOBALSIS.fila.cursor, data);
    GLOBALSIS.navegacao[GLOBALSIS.fila.cursor] = data;
    
    if(GLOBALSIS.fila.cursor > GLOBALSIS.fila.last){
        //Deleta o primeiro item
        //sessionStorage.removeItem(GLOBALSIS.fila.first);
        GLOBALSIS.navegacao[GLOBALSIS.fila.first] = "";
        
        GLOBALSIS.fila.first++;
        GLOBALSIS.fila.cursor++;
        GLOBALSIS.fila.virtualCursor ++;
    }else{
        GLOBALSIS.fila.cursor++;
    }
}

function getSessionStorage(key){
    //return sessionStorage.getItem(key);
    return GLOBALSIS.navegacao[key];
}


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
    
    $play.addPage($("#inter").html());

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
            var data = $("#" + obj.ret).html(data);
            //addSessionStorage(data.html());
            
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
