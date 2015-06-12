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
        messenger: {}
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

function setGlobal(key, vlr) {
    GLOBALSIS[key] = vlr;
}

function getGlobal(key) {
    return GLOBALSIS[key];
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
