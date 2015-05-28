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
        alert($play.getInputsForm("#frm"));
    });

    $play.managerPag($('.godown'), $('.goup'), $('#inter'));

});

function lockClick(time) {
    GLOBALSIS.canClick = false;

    //Se for definido um tempo (time), seta timeout para o tempo definido
    //Se nao houver, seta o timeout com o default
    var timeout = (time) ? time : GLOBALSIS.timeOutButton;

    $play.initTimeOut(timeout, function () {
        unlockClick();
    });
}

function unlockClick() {
    GLOBALSIS.canClick = true;
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

    $play.showLoader(true);

    //Verifica se há o param ret. Se não há, seta como inter
    obj.ret = (!obj.ret) ? "inter" : obj.ret;

    var ajax = $play.sendToServer(obj);
    //var ajax = initAjax(obj);

    //Conexão falhou
    ajax.fail(function (data) {
        alert("Não foi possível enviar requisição para o servidor: \n");
        $("#inter").html(data);
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
        $play.showLoader(false);
    });
}

function setGlobal(key, vlr) {
    GLOBALSIS[key] = vlr;
}

function getGlobal(key) {
    return GLOBALSIS[key];
}
