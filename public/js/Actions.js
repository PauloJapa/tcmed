
/*
 * Project:
 * Name:
 * Date:
 * Function:
 */

/**
 * Initialize Actions
 * 
 */
if (!window.App) {
    window.App = {
        settings: {},
        actions: {}
    };
}
else {
    window.App.actions = {};
}
;
var action = window.App.actions;

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
        }
    }

})(jQuery, App.settings);
