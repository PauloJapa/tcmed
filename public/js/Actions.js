
/*
 * Project: Actions.js
 * Description: Centralizador de Ações do sistema
 * Date: 24_06_2015
 */

/**
 * Initialize Actions
 * 
 */
if (!window.App) {
    window.App = {
        SETTINGS: {},
        ACTIONS: {}
    };
}
else {
    window.App.ACTIONS = {};
}
;
var action = window.App.ACTIONS;

/**
 * Actions
 */
action = (function ($, options) {

    
    var errors = {
        serverNotFound: function (url, e) {
            console.error("Servidor '" + url + "' não pode ser localizado!\n"
                    + " Verifique o endereco do servidor! " + e);
        },
        accessDanied: function () {
            console.error("Acesso não permitido");
        }
    };

    /**
     * @constructor
     */
    return {
        /**
         * Centralizador de requisiçoes para o servidor
         * @public
         * @author Danilo Dorotheu
         * @param {Object} arg URL do Servidor, Tipo (POST/GET), Dados
         * @returns {AJAX} 
         */
        requestServer: function (arg) {
            arg.url = arg.url + "?ajax=ok&"; //Trata erro de ajax

            if (arg.type !== "POST") {
                arg.type = "GET";
                arg.url = arg.url + "?ajax=ok&" + Math.ceil(Math.random() * 100000);
            }

            return $.ajax(arg)
                    .fail(function (e, status) {
                        errors.serverNotFound(arg.url, status);
                    });
        },
        
        /**
         * Gerenciador de envio/recebimento de dados
         * @public
         * @see {@link requestServer}
         * @author Danilo Dorotheu
         * @param {Object} obj Parametros de Request
         * @returns {undefined}
         */
        processa: function (obj) {
            options.lastRequest = obj;
            
            if (obj.url === "" || obj.url === "#") {
                return;
            }

            //Verifica se há o param ret. Se não há, seta o default
            obj.ret = (obj.ret) ? obj.ret : settings.defReturn;

            action.loader(true); //liga o loader

            module.Pagination.savePage();

            var ret = action.requestServer({
                url: settings.path + obj.url,
                data: transformFormToObject($("#" + obj.frm)),
                type: (obj.frm) ? "POST" : "GET"
            }).done(function (data) {
                $(obj.ret).html(data);
            }).complete(function () {
                action.loader(false); //Desliga o loader
                module.Pagination.addPage();
            });
        },
        notification: function (options) {
            if (!("Notification" in window)) {
                console.log("Este browser não suporta notificações de desktop");
            }
            else if (Notification.permission === "granted") {
                var notification = new Notification(options.title, options);
            }
            else if (Notification.permission !== 'denied') {
                Notification.requestPermission(function (permission) {
                    if (!('permission' in Notification)) {
                        Notification.permission = permission;
                    }

                    if (permission === "granted") {
                        var notification = new Notification(options.title, options);
                    }
                });
            }
        },
        loader: function (status) {
            if ($(".loader").html() === undefined) {
                $("body").append('<i class="loader fa fa-3x fa-spinner fa-spin"></i>');
                $(".loader").css({
                    position: "absolute",
                    left: "50%",
                    top: "50%"
                });
            }

            if (status) {
                $(".loader").show();
            } else {
                $(".loader").hide();
            }
        },
        nextFocus: function (obj) {
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

    };

})(jQuery, App.SETTINGS);
