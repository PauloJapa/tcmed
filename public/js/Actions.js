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
        ACTIONS: {},
        ACTION_EVENTS:{}
    };
}
else {
    window.App.ACTIONS = {};
    window.App.ACTION_EVENTS = {};
}
;
var action = window.App.ACTIONS;
var actionEvents = window.App.ACTION_EVENTS;

/**
 * Acoes Eventos
 * @class ActionEvents
 * @param  {[type]} $) { var $doc [description]
 * @return {[type]}    [description]
 */
actionEvents = (function ($) {
    /**
    * @type {jQuery}
    */
    var $doc = $(document);
    /**
     * Public Events
     */
    return {
        /**
         * Executa acoes do onClick
         * @param {jQuery|String} attr Elemento DOM que sera observado
         * @param {function} execMe Funcao de execucao quando ocorrencia ocorre
         * @author Danilo Dorotheu
         * @version 1.0
         */
         click: function(attr, execMe) {
            return $doc.on("click", attr, execMe);
        },
        /**
         * Executa acoes do onChange
         * @param {jQuery|String} attr Elemento DOM que sera observado
         * @param {function} execMe Funcao de execucao quando ocorrencia ocorre
         * @author Danilo Dorotheu
         * @version 1.0
         */
         change: function(attr, execMe){
            return $doc.on("change", attr, execMe);
        },
        /**
         * Executa acoes do onKeyUp
         * @param {jQuery|String} attr Elemento DOM que sera observado
         * @param {function} execMe Funcao de execucao quando ocorrencia ocorre
         * @author Danilo Dorotheu
         * @version 1.0
         */
         keyup: function(attr, execMe) {
            return $doc.on("keyup", attr, execMe);
        },
        /**
         * Executa acoes do onKeyDown
         * @param {jQuery|String} attr Elemento DOM que sera observado
         * @param {function} execMe Funcao de execucao quando ocorrencia ocorre
         * @author Danilo Dorotheu
         * @version 1.0
         */
         keyDown: function(attr, execMe) {
            return $doc.on("keydown", attr, execMe);
        },
        /**
         * Executa funcoes do onKeyPress
         * @param {jQuery|String} attr Elemento DOM que sera observado
         * @param {function} execMe Funcao de execucao quando ocorrencia ocorre
         * @author Danilo Dorotheu
         * @version 1.0
         */
         keyPress: function(attr, execMe){
            return $doc.on("keypress", attr, execMe);
        },
        /**
         * Executa acoes de clickOut do elemento
         * @param {jQuery|String} $container Elemento DOM que sera observado
         * @param {function} execMe Funcao de execucao quando ocorrencia ocorrer
         * @author Danilo Dorotheu
         * @version 1.0
         */
         clickOut: function($container, execMe) {
            $container = $($container);
            $doc.mouseup(function (e) {
                if (!$container.is(e.target) // if the target of the click isn't the container...
                        && $container.has(e.target).length === 0) // ... nor a descendant of the container
                {
                    execMe();
                }
            });
        }
    }

})(jQuery);


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
         * @author Paulo Watakabe
         * @version 1.0
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
         * @returns {obj} contato Objeto que contem a string cont
         * @author Danilo Dorotheu
         * @versin 1.0
         */
        findContact: function (listaContatos, cont) {
            var contato;

            if (!listaContatos)
                return false;

            $.each(listaContatos, function (chave, valor) {
                if (chave == cont) {
                    contato = valor;
                    return;

                } else if (valor.name == cont) {
                    contato = valor;
                    return;
                }
            });

            return contato;
        },
        /**
         * Retorna o ID do contato
         * @param  {[type]} lista [description]
         * @return {[type]}       [description]
         */
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
            console.log(JSON.stringify(obj));
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
                data: (obj.data) ? obj.data : transformFormToObject($("#" + obj.frm)),
                type: (obj.frm || obj.type == "POST") ? "POST" : "GET"
            }).done(function (data) {
                $(obj.ret).html(data);
            }).complete(function () {
                action.loader(false); //Desliga o loader
                module.Pagination.addPage();
            });
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
                    //Converte para JSON
                    response = JSON.parse(response);
                    //Armazena o resultado localmente
                    params.results = response[0];

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

                            function removeElementArray(elem, arr){
                                var aux = arr.indexOf(elem);
                                if(aux > -1){
                                    arr.splice(aux, 1);
                                }
                                return arr;
                            }

                            var obj = {};
                            //Retira do array, o valor principal
                            obj['value'] = dataItem[params.primary];
                            
                            //Remove elemento do header
                            header = removeElementArray(params.primary, header);
                            
                            //Oculta itens
                            if(params.hideCols){
                                $.each(params.hideCols, function(i, col){
                                    if(dataItem[col]){
                                        header = removeElementArray(col, header);
                                    }
                                });
                            }

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
                        console.log(JSON.stringify(params.results));
                        console.log(key);
                        if(params.results[key]){
                            //Para cada input, jogar value
                            $.each(value, function(i, field){
                                $(field).val(params.results[key]);
                            });
                        }

                    });
                }

            };
            //Extende os parametros
            $.extend(params, params, localParams);
            $(element).autocomplete(params);
        },
        /**
         * SUPER ACTION
         * 
         * @param  {jQuery} element: Elemento a ser observado
         * @param  {Object} params: Parametros
         * @return {[type]}         [description]
         */
        searchTable: function(element, params) {
            var requestServer = this.requestServer;
            //Variaveis locais
            defaults = {
                table: "#table-search",
                url: "",
                type: "POST",
                elementReturn: "",
            }
            //mescla os parametros
            $.extend(params, params, defaults);
            //Instancia do actionEvents local;
            var ev = actionEvents;
            
            /**
             * [process description]
             * @return {[type]} [description]
             */
            function process(results) {

            }
            /**
             * [search description]
             * @return {[type]} [description]
             */
            function search() {
                console.log("here");
                //Faz request no servidor
                requestServer({
                    url: defaults.url,
                    type: defaults.type,
                    data: {
                        value: $(element).val()
                    }

                }).success(function(results){
                    //Processa JSON
                    process(JSON.parse(results));
                });
            }
            /**
             * Controla os eventos
             * @return {[type]} [description]
             */
            function events(){
                ev.keyup(element, function() {
                    search();
                });
            }
            /**
             * INITIALIZE SUPER ACTION
             */
            events();
        }

    }

})(jQuery, App.SETTINGS);
