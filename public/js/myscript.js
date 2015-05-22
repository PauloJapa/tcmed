var GLOBALSIS = [];
var canClick = true;


$(function () {
});

function initTimeOut(time, funcao) {
    var timeOut = setTimeout(funcao, time);
    return timeOut;
}

function getInputsForm(idDoForm) {
    var dadosDoForm = {};
    var form = $('#' + idDoForm);

    form.find('input').each(function () {
        if ($(this).attr('type') == 'checkbox' || $(this).attr('type') == 'radio') {
            if ($(this).is(':checked')) {
                dadosDoForm[$(this).attr('name')] = $(this).val();
            }
        } else {
            dadosDoForm[$(this).attr('name')] = $(this).val();
        }
    });

    /*
     form.find('select').find('option:selected').each(function () {
     dadosDoForm["'" + this.attr('name') + "'"] = this.val();
     });
     */
    return dadosDoForm;
}

function proccess(obj) {
    obj.ret = (!obj.ret) ? 'inter' : obj.ret;

}



function processa(obj) {
    if (!obj.ret) {
        obj.ret = 'inter';
    }

    var ajax = initAjax(obj);


    ajax.fail(function () {
        alert("Não foi possível enviar requisição para o servidor: \n" + obj.url);
    });
    
    ajax.complete(function(){
        alert("Finalizando");
    });
}

function ajaxControl(obj) {
    var ajax;
    
    if (obj.frm) { //Se houver formulario
        ajax = $.ajax({
            method: "POST",
            url: obj.url,
            data: getInputsForm(obj.frm) //Retorna JSON com os dados do form
        });
    } else { //Se não houver formulario
        ajax = $.ajax({
            method: "GET",
            url: obj.url + "?" + Math.ceil(Math.random() * 100000)
        });
    }
    ;

    ajax.fail(function(){
        alert("Não foi possível encontrar o servidor");
    });
    
    ajax.complete(function(){
        alert("Ajax completo");
    });
    
   
    ajax.done(function (data) {
        if(obj.ret){
            $("#" + obj.ret).html(data);
        }
    });
}
;

function setGlobal(key, vlr) {
    GLOBALSIS[key] = vlr;
}

function getGlobal(key) {
    return GLOBALSIS[key];
}
