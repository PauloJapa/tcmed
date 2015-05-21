var GLOBALSIS = new Array();

$(function () {

});

function getInputsForm(idDoForm) {
    var dadosDoForm = {};
    var form = $('#' + idDoForm);

    form.find('input').each(function () {
        if($(this).attr('type') == 'checkbox' || $(this).attr('type') == 'radio'){
            if($(this).is(':checked')){
                dadosDoForm[$(this).attr('name')] = $(this).val();
            }
        }else{
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

function processaAjax(url, idForm, target) {
    var ajax = initAjax(idForm);

    ajax.done(function (msg) {
        if(target){
            $("#" + target).html(msg);
        }
    });

    ajax.fail(function () {
        alert("Não foi possível enviar requisição para o servidor: \n" + url);
    });
}

function initAjax(idForm){
    if (idForm) { //Se houver formulario
        return $.ajax({
            method: "POST",
            url: url,
            data: getInputsForm(idForm) //Retorna JSON com os dados do form
        });
    } else { //Se não houver formulario
        return $.ajax({
            method: "GET",
            url: url
        });
    }
}

function setGlobal(key,vlr){
    GLOBALSIS[key] = vlr;
}

function getGlobal(key){
    return GLOBALSIS[key] ;
}