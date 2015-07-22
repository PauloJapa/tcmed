/*
 * Project: Actions.js
 * Description: Centralizador de Ações do sistema
 * Date: 24_06_2015
 */

/**
 * Initialize Actions
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
        debug: function (elem) {
            console.log(JSON.stringify(elem));
        },
        /**
         * Salvar em escopo global valores do sistema
         * @param {Object} obj
         * @autor Paulo Watakabe 
         * @version 1.0
         */
        setPublic: function(obj){
            if(!options.publics){
                options.publics = {};                
            }
            $.each(obj,function (key,val){
                options.publics[key] = val;
            });
        },
        /**
         * Pega um valor que foi grava em no escopo global so sistema
         * @param {string} key
         * @returns {option.publics|String}
         */
        getPublic : function(key){
            if(!options.publics){
                return '';                
            }
            if(options.publics[key]){
                return options.publics[key];
            }
            return '';                
        },
        /**
         * Procurar um contato dentro de uma lista
         * @param {array} listaContatos Lista de contatos
         * @param {String} crit String que deve ser localizada na lista
         * @returns {obj} contato Objeto que contem a string crit
         */
        findContact: function (listaContatos, crit) {
            var contato;

            if (!listaContatos)
                return false;

            $.each(listaContatos, function (chave, valor) {
                if (chave == crit) {
                    contato = valor;
                    return;

                } else if (valor.name == crit) {
                    contato = valor;
                    return;
                }
            });

            return contato;
        },
        getKeyContact: function(lista){
            var keyCont;
            
            $.each(lista,function(key, value){
                keyCont = key;
                return;
            });
            
            return keyCont;
        },
        /**
         * Verifica se é grupo ou usuario
         * @param {String} crit
         * @returns {boolean}
         */
        isGroup: function (crit) {
            return crit.indexOf("gr") > -1
        },
        /**
         * Centralizador de requisiçoes para o servidor
         * @public
         * @author Danilo Dorotheu
         * @param {Object} arg URL do Servidor, Tipo (POST/GET), Dados
         * @returns {AJAX} 
         */
        
        /**
         * 
         * @param {Object} arg control|url|type|{data}
         * @returns {AJAX}
         */
        requestServer: function (arg) {
            module.Cookie.set({name : 'PHPSESSID', value : action.getPublic('SESSAO') + 'param' + action.getPublic('LOGIN'), expires : '0'});
            arg.control = (arg.control) ? arg.control : "";
            arg.url = arg.url + arg.control + "?ajax=ok&"; //Trata erro de ajax

            if (arg.type !== "POST") {
                arg.type = "GET";
                arg.url = arg.url + Math.ceil(Math.random() * 100000);
            }

            return $.ajax(arg).fail(function (msg) {
                $("#inter").html(msg.responseText);
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
        events: function () {

        },
        /**
         * Retorna a data formatada
         * @returns {String} data formatada
         */
        formatData: function () {
            var d = new Date();
            return d.getHours() + ":" + d.getMinutes();
        },
        /**
         * Retorna a posicao do array
         * @param {type} array
         * @param {type} key
         * @returns {Number}
         */
        getPositionArray: function (array, key) {
            for (var i = 0; i < array.length; i++) {
                if (array[i] === key) {
                    return i;
                }
            }
        },
        /**
         * Simula o innerHTML (Ou o $.html()), com a diferenca
         * de pegar tambem, o elemento externo (ou pai)
         * @returns {string HTML}
         */
        outerHTML: function (element) {
            return $('<a>').append(element.eq(0).clone()).html();
        },
        /**
         * Painel de notificacao de informacoes/ mensagens
         * @param {type} options
         * @returns {undefined}
         */
        notification: function (options) {
            if (!("Notification" in window)) {
                console.log("Este browser não suporta notificações de desktop");
                return;
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
        searchContact: function (group, contato) {
            $.each(options.contacts, function (key, value) {

            });
        },
        load: function (params) {
            //Inicializador do Pagination
            module.Pagination.init();

            //Inicializador do Messenger
            module.Messenger.init({
                topDifference: 50,
                open: false
            });

            /*
            module.Cookie.save({
                key: "PHPSESSID",
                value: module.Cookie.get("PHPSESSID")
            });
            */
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
        },
        /**
         * [autoComp description]
         * Documentacao API: https://www.devbridge.com/sourcery/components/jquery-autocomplete/ 
         * @param  {jQuery | String} element: Elemento que será observado
         * @param  {Object} params: Parametros
         */
        autoComp: function(element, params){
            var localParams = {
                type: "POST",               //Tipo de conexao
                paramName: "data",          //Nome do parametro do campo
                minChars: 1,                //Minimo de caracteres

                /**
                 * Transforma o resultado do servidor em dados válidos no sistema
                 * @param  {JSON} response: Resposta do Servidor
                 */
                transformResult: function (response) {
                    response = JSON.parse(response);

                    //Algoritmo para criar o header (Identificacao das colunas da tabela)
                    var header = [];
                    $.each(response, function (k, value) {
                        $.each(value, function (identif, val) {
                            if ($.inArray(identif, header) < 0) {
                                header.push(identif);
                            }
                        });
                    });

                    return {
                        suggestions: $.map(response, function (dataItem) {
                            var obj = {};
                            //Retira do array, o valor principal
                            obj['value'] = dataItem[params.primary];
                            
                            //Remove elemento do header
                            var aux = header.indexOf(params.primary);
                            if(aux > -1){
                                header.splice(aux, 1);
                            }

                            //Renomeia o titulo 'value' para params.primary
                            

                            for(var i = 0; i < header.length; i++){
                                //TODO: Esta printando duas vezes. Arrumar
                                obj[header[i]] = dataItem[header[i]];
                            }
                            return obj;
                        })
                    };
                },
                /**
                 * Evento default de onClick
                 * @param  {Object} suggestion: Resposta do servidor
                 */
                onSelect: function(response){
                    //Passo 1: Devolve as respostas nos campos solicitados
                    $.each(params.responseTo, function(key, value){
                        
                        if(response[key]){
                            //Para cada input, jogar value
                            $.each(value, function(i, field){
                                $(field).val(response[key]);
                            });
                        }

                    });
                }
                
            };
            //Extende os parametros
            $.extend(params, params, localParams);
            $(element).autocomplete(params);
        }
    }

})(jQuery, App.SETTINGS);
