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
    var ajax;
    if (!obj.ret) {
        obj.ret = 'inter';
    }

    if (obj.frm) { //Se houver formulario
        ajax = $.ajax({
            method: "POST",
            url: obj.url,
            data: getInputsForm(obj.frm) //Retorna JSON com os dados do form
        });
    } else { //Se não houver formulario
        ajax = $.ajax({
            method: "GET",
            url: obj.url
        });
    }

    ajax.done(function (msg) {
        $("#" + obj.ret).html(msg);
    });

    ajax.fail(function () {
        alert("Não foi possível enviar requisição para o servidor: \n" + obj.url);
    });
}
;
