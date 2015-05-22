var GLOBALSIS=[];

$(function () {

});

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

function processa(obj) {
    if (!obj.ret) {
        obj.ret = 'inter';
    }

    var ajax = initAjax(obj);

    ajax.done(function (data) {
        $("#" + obj.ret).html(data);
    });

    ajax.fail(function () {
        alert("Não foi possível enviar requisição para o servidor: \n" + obj.url);
    });
}

function initAjax(obj){
    if (obj.frm) { //Se houver formulario
        return $.ajax({
            method: "POST",
            url: obj.url,
            data: getInputsForm(obj.frm) //Retorna JSON com os dados do form
        });
    } else { //Se não houver formulario
        return $.ajax({
            method: "GET",
            url: obj.url
        });
    }
}

function setGlobal(key,vlr){
    GLOBALSIS[key] = vlr;
}

function getGlobal(key){
    return GLOBALSIS[key] ;
}