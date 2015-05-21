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

function processa(url, idForm, target) {
    var ajax;

    if (idForm) { //Se houver formulario
        ajax = $.ajax({
            method: "POST",
            url: url,
            data: getInputsForm(idForm) //Retorna JSON com os dados do form
        });
    } else { //Se não houver formulario
        ajax = $.ajax({
            method: "GET",
            url: url
        });
    }

    ajax.done(function (msg) {
        if(target){
            $("#" + target).html(msg);
        }
    });

    ajax.fail(function () {
        alert("Não foi possível enviar requisição para o servidor: \n" + url);
    });
}
;
