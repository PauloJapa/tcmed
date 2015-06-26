
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

    return {
        /**
         * Centralizador de requisiçoes para o servidor
         * -
         * @param {type} arg
         * @returns {unresolved}
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
