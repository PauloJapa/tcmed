
/*
 * Project: Modules.js
 * Description: Centralizador de Módulos do sistema
 * Date: 24_06_2015
 */

/**
 * Initialize Actions
 * 
 */
if (!window.App) {
    window.App = {
        SETTINGS: {},
        MODULES: {}
    };
}
else {
    window.App.MODULES = {};
}
;

var module = window.App.MODULES;

module.Pagination = (function (window, document, $, settings) {

    /**
     * Definiçoes default do Pagination
     * -
     * @type Object
     */
    var defaults = {
        back: "#godown",
        next: "#goup",
        menu: "#side-menu",
        cont: "#inter",
        iniArray: 1,
        cursor: 0,
        endArray: 0,
        lenghtArray: 9,
        pages: {
            menu: {},
            data: {}
        }
    };

    /**
     * Retorna a pagina com forms fixados
     * 
     * @returns {jQuery} html
     */
    var getPage = function () {
        //Fixa os dados no html
        fixDataForm();
        //Retorna html
        return $(settings.pagin.cont).html();
    };

    /**
     * Salva a pagina atual no cache
     * (Alternativa para ser chamado de dentro da classe)
     * 
     * @returns {undefined}
     */
    var savePageCache = function () {
        settings.pagin.pages.data[settings.pagin.cursor] = getPage();
    };

    /**
     * Fixa dados no html 
     * (Trata erro de salvar pagina)
     * 
     * @returns {undefined}
     */
    var fixDataForm = function () {
        //Transforma o container em objeto JQuery
        var cont = $(settings.pagin.cont);

        //Pra cada input dentro do container...
        cont.find("input").each(function () {
            //Check os radios e os checks ativos
            if ($(this).prop("checked")) {
                $(this).attr("checked", "checked");
            }
            //Descheck os radios e os checks inativos
            else {
                $(this).removeAttr("checked");
            }
            // Definir o value dos tipos textos, senhas...
            $(this).attr("value", $(this).val());
        });
        //Pra casa select dentro do container...
        cont.find("select").each(function () {
            //Remover :selected dos options nao selecionados
            $(this).find("option").not($(this)
                    .find("option:selected")).removeAttr("selected");
            //Adicionar :selected dos options selecionados
            $(this).find("option:selected").attr("selected", "selected");
        });
        //Pra cada textarea dentro do container...
        cont.find("textarea").each(function () {
            //Definir texto utilizando o value
            $(this).text($(this).val());
        });
    };

    /**
     * Metodo de gerenciamento dos botoes de voltar pagina
     * e avançar pagina
     * 
     * @returns {undefined}
     */
    var managerClickPagin = function () {
        //Transforma os params em objetos JQuery
        var next = $(settings.pagin.next);
        var back = $(settings.pagin.back);
        var cont = $(settings.pagin.cont);

        //Desabilita os botoes de back e next
        back.attr("disabled", true);
        next.attr("disabled", true);

        //Eventos do botao back
        $(document).on("click", settings.pagin.back, function () {
            //Habilita o botao next
            next.attr("disabled", false);
            //Salva a pagina atual
            savePageCache();
            //decrementa cursor
            settings.pagin.cursor--;
            //Retorna a pagina salva anterior
            cont.html(settings.pagin.pages.data[settings.pagin.cursor]);
            //Clica no item de menu respectivo a pagina
            $(settings.pagin.pages.menu[settings.pagin.cursor]).click();
            //Se for a primeira posicao, desabilita o botao voltar
            if (settings.pagin.cursor === settings.pagin.iniArray) {
                back.attr("disabled", true);
            }
        });

        $(document).on("click", settings.pagin.next, function () {
            //Habilita o botao back
            back.attr("disabled", false);
            //Salva a pagina atual
            savePageCache();
            //Incrementa cursor
            settings.pagin.cursor++;
            //Retorna a proxima pagina salva 
            cont.html(settings.pagin.pages.data[settings.pagin.cursor]);
            //Clica no item de menu respectivo a pagina
            $(settings.pagin.pages.menu[settings.pagin.cursor]).click();
            //Se for a ultima posicao, desabilita o botao avancar
            if (settings.pagin.cursor === settings.pagin.endArray) {
                next.attr("disabled", true);
            }
        });
    };

    /**
     * Métodos Públicos
     * -
     * @param {type} options
     * @returns {undefined}
     */
    return {
        init: function (options) {

            settings.pagin = {};

            //Mescla as opcoes com settings
            $.extend(settings.pagin, options, defaults);

            //Salva a primeira pagina
            this.addPage();
            //Inicializa os eventos back e next
            managerClickPagin();

        },
        savePage: function () {

            if (settings.pagin) {
                savePageCache();
            }

        },
        addPage: function () {
            if (settings.pagin) {
                //Se for a primeira posicao
                if (settings.pagin.cursor >= settings.pagin.iniArray) {
                    //Habilita o botao back
                    $(settings.pagin.back).attr("disabled", false);
                }
                //Incrementa cursor
                settings.pagin.cursor++;
                //Define fim do array
                settings.pagin.endArray = settings.pagin.cursor;
                //Salva a proxima pagina
                savePageCache();
                //Salva o item de menu da pagina
                settings.pagin.pages.menu[settings.pagin.cursor] = $(settings.pagin.menu).find("a.active");
                //Controla tamanho do array
                if (settings.pagin.endArray - settings.pagin.iniArray > settings.pagin.lenghtArray) {
                    settings.pagin.iniArray++;
                }
                //Desabilita o botao next
                $(settings.pagin.next).attr("disabled", true);
            }
        }
    };

})(window, document, jQuery, App.SETTINGS);

module.Messenger = (function (window, document, $, options) {

    var settings = {
        element: "messenger",
        userId: "7",
        userName: "mename",
        status: "online",
        server: "/app/messenger",
        interval: 5000,
        notify: true,
        topDifference: 0,
        userTo: "nobody",
        open: true,
        contacts: {
        }
    };

    /**
     * Centralizador de erros 
     * @type type
     */
    var errors = {
        serverNotFound: function (server) {
            var error = "Servidor '" + server + "' não pode ser localizado!:"
                    + " Verifique o endereco do servidor";
            console.error(error);
        },
        notificationError: function () {
            var error = "Este browser não suporta notificações de desktop";
            console.error(error);
        }
    };

    /**
     * Gerenciador de eventos
     * @returns {undefined}
     */
    var events = function () {
        var $doc = $(document);

        /**
         * Abstracao da funcao onclick
         * @param {type} attr
         * @param {type} funcao
         * @returns {unresolved}
         */
        function $click(attr, funcao) {
            return $doc.on("click", attr, funcao);
        }

        function $keyup(attr, funcao) {
            return $doc.on("keyup", attr, funcao);
        }

        /**
         * Enviar mensagem
         * @returns {undefined}
         */
        $click("#chat-send", function () {
            sendMessage();
        });

        /**
         * Envia a mensagem com o Enter
         * @param {type} e
         * @returns {undefined}
         */
        $keyup("#msg-chat", function (e) {
            if (e.keyCode === 13 && $("#send-enter").prop("checked")) {
                if ($("#send-enter").is(":checked")) {
                    $("#chat-send").click();
                    e.preventDefault();
                }
            }
        });

        /**
         * Exibe todos os usuarios na tela de contatos
         * @returns {undefined}
         */
        $click(".view-all", function () {
            $(".show-users").find(".active").removeClass("active");
            $(this).addClass("active");
            $("#chat-contacts").find("button").show();
        });

        /**
         * Exibe apenas os usuarios online na tela de contatos
         * @returns {undefined}
         */
        $click(".view-online", function () {
            $(".show-users").find(".active").removeClass("active");
            $(this).addClass("active");
            $("#chat-contacts").find("button").hide();
            $("#chat-contacts").find(".btn-success").show();
            //$("#chat-contacts").find(".btn-danger").show();
        });

        /**
         * Exibe apenas os grupos na tela de contatos
         * @returns {undefined}
         */
        $click(".view-groups", function () {
            $(".show-users").find(".active").removeClass("active");
            $(this).addClass("active");
            $("#chat-contacts").find("button").hide();
            $("#chat-contacts").find(".btn-primary").show();
        });

        /**
         * Gerencia pesquisa de usuarios
         * @returns {undefined}
         */
        $keyup("#text-search", function () {
            $(".view-all").click();

            $("#chat-contacts").find("button").hide();

            $.each(settings.contacts, function (index, contact) {
                var cont = contact.name.toUpperCase();
                var str = $("#text-search").val().toUpperCase();
                if (cont.indexOf(str) > -1) {
                    $(".btn-" + index).show();
                }
                ;
            });
        });

        /**
         * Troca status do usuario para online
         * @returns {undefined}
         */
        $click(".setOnline", function () {
            changeMeStatus("online");
            sendStatus("online");
            settings.notify = true;
        });

        /**
         * Troca status do usuario para ocupado
         * @returns {undefined}
         */
        $click(".setBusy", function () {
            changeMeStatus("busy");

            sendStatus("busy");

            settings.notify = false;
        });

        /**
         * Troca status do usuario para offline
         * @returns {undefined}
         */
        $click(".setOffline", function () {
            changeMeStatus("offline");

            sendStatus("offline");

            settings.notify = false;
        });

        /**
         * Abre a conversa com um contato/ grupo
         * @returns {undefined}
         */
        $click(".btn-get", function () {
            $(".chat-list").animate({
                opacity: 0
            }, "slow").hide();
            $(".chat-window").css("opacity", "0").show().animate({opacity: 1}, "fast");

            buildConversation($(this).attr("id"));
        });

        /**
         * Retorna para a lista de contatos
         * @returns {undefined}
         */
        $click("#chat-back", function () {
            $(".chat-window").animate({opacity: 0}, "fast").hide();
            $(".chat-list").show().animate({
                opacity: 1
            }, "slow");

            settings.userTo = "";
        });

        /**
         * Abre/ fecha a tela do chat
         * @returns {undefined}
         */
        $click("#messenger", function () {
            //Converte DOM em Obj Jquery 
            var $messenger = $(".messenger");

            if ($messenger.is(":visible")) {
                settings.chatIsOpen = false;
                $messenger.animate({
                    opacity: 0
                }, "fast", function () {
                    $messenger.hide();
                });
            } else {
                settings.chatIsOpen = true;
                $messenger.show();
                $messenger.animate({
                    opacity: 1
                }, "slow");
            }
        });
        
        $click("#show-old-today", function(){
            getHistory("today", settings.userTo);
        });

        $click("#show-old-week", function(){
            getHistory("week", settings.userTo);
        });
    }; //!events

    /**
     * Pergunta ao servidor, qual e o usuário pertencente
     * a sessao atual
     * @returns {undefined}
     */
    var whoIam = function () {
        action.requestServer({
            "url": settings.server + "/whoiam"
        }).success(function (ret) {
            ret = JSON.parse(ret);

            settings.userId = ret.userid;
            settings.userName = ret.username;
        });
    };

    /**
     * Altera o Status do(s) Contato(s)
     * @param {Object} data id:status do usuario
     * @param {boolean} canNotify Omite a notificacao (se false)
     * @returns {undefined}
     */
    var changeStatus = function (data, canNotify) {
        canNotify = (canNotify == false) ? canNotify : true;

        var state = {
            "online": "success",
            "busy": "danger",
            "offline": "warning",
            "group": "primary"
        };

        $.each(data, function (name, status) {
            settings.contacts[name].status = status;

            $.each(state, function (k, classe) {
                $(".btn-" + name).removeClass("btn-" + classe);
                $(".panel-" + name).removeClass("panel-" + classe);
            });
            $(".btn-" + name).addClass("btn-" + state[status]);
            $(".panel-" + name).addClass("panel-" + state[status]);


            if (canNotify && settings.notify) {

                //Trata a notificação
                var aux = {
                    title: settings.contacts[name].name,
                    dir: "ltr"
                };

                switch (status) {
                    case "offline":
                        aux.body = "Saiu do chat";
                        action.notification(aux);
                        break;
                    default:
                        aux.body = "Entrou no chat";
                        action.notification(aux);
                        break;
                }
            }
        });
    };

    /**
     * Troca o status do usuario da sessao
     * @param {string} status Meu status
     * @returns {undefined}
     */
    var changeMeStatus = function (status) {
        var messenger = $("#messenger")
                .removeClass("btn-default")
                .removeClass("btn-warning")
                .removeClass("btn-danger")
                .removeClass("btn-success");

        switch (status) {
            case "online":
                messenger.addClass("btn-success");
                break;
            case "busy":
                messenger.addClass("btn-danger");
                break;
            default:
                messenger.addClass("btn-warning");
                break;
        }
    };

    /**
     * Enviar Mensagem
     * @returns {undefined}
     */
    var sendMessage = function () {
        var msg = $("#msg-chat").val();

        var message = {
            url: settings.server + "/sendMsg",
            type: "POST",
            data: {
                msg: $.trim(msg),
                userby: settings.userId,
                userto: settings.userTo,
                dtime: action.formatData(),
            }
        };

        var _data = action.requestServer(message);

        _data.success(function () {
            if(!settings.contacts[settings.userTo].logMsg){
                settings.contacts[settings.userTo].logMsg = [];
            }
            settings.contacts[settings.userTo].logMsg.push(message.data);

            printMessage(message.data);
        });

        $("#msg-chat").val(""); //Limpa input
    };
    /**
     * 
     * @param {String} crit Periodo
     * @param {String} grupo Grupo responsavel pelas mensagens
     * @returns {undefined}
     */
    var getHistory = function (periodo, from) {
        action.requestServer({
            url: settings.server + "/getHistory",
            data: {
                "period": periodo,
                "userId": settings.userId,
                "from": from
            }
        }).success(function (ret) {
            ret = JSON.parse(ret);
            $(".chat-view").html(""); //Limpa o chatview

            $.each(ret, function (chave, valor) {
                printMessage(valor);
            });
        });
    };

    /**
     * Exibe a mensagem na tela (Ou notifica, caso
     * a janela do contato não esteja aberta)
     * @param {type} message
     * @param {String|Object} contato responsavel pela mensagem 
     * @param {boolean} isChanged Inverte a insercao do elemento no html (prepend)
     * @returns {undefined}
     */
    var printMessage = function (message) {
        var cabecalho;
        var nomeContato;

        //1: Converte o nome do contato
        if (settings.contacts[message.userby]) {
            nomeContato = settings.contacts[message.userby].name;
        } else {
            var listaContatos = settings.contacts[message.userto].contatosDoGrupo;
            nomeContato = action.findContact(listaContatos, message.userby);

            if (nomeContato) {
                nomeContato = nomeContato.name;
            } else {
                nomeContato = "Contato";
            }
        }

        //2: Monta o cabecalho
        cabecalho = "<div class='scroll "; //Abre o cabecalho

        if (message.userby == settings.userId) {
            cabecalho += "msg-me'><em>(" + message.dtime + ") Eu digo:</em><br>";
        }
        else {
            cabecalho += "msg-0'><em>(" + message.dtime + ") " + nomeContato + " diz:</em><br>";
        }

        //3: Renderiza na tela
        $(".chat-view").append(cabecalho + message.msg + "</div>");

        //4: Trata scroll
        $(".chat-view").scrollTop($(".chat-view").scrollTop() + $(".scroll").height() + 50);
        $(".scroll").removeClass("scroll");
        
    };



    /**
     * Receber Mensagem
     * @returns {undefined}
     */
    var receiveMessage = function () {

        var _data = action.requestServer({
            url: settings.server + "/receiveMsg",
            data: {
                userId: settings.userId
            }
        }).success(function (ret) {
            var objmsg = JSON.parse(ret);

            if (objmsg) {
                $.each(objmsg, function (key, msgbody) {
                    //if (settings.contacts[msgbody.userby]) {

                    if (msgbody.userto.indexOf("gr") > -1) {

                        //Armazena no log de mensagens
                        settings.contacts[msgbody.userto].logMsg.push(msgbody);

                        if (settings.userTo == msgbody.userto && settings.chatIsOpen) {
                            printMessage(msgbody);
                        } else {

                            action.notification({
                                title: settings.contacts[msgbody.userto].name,
                                body: msgbody.msg + "\n " + msgbody.dtime,
                                dir: "ltr"
                            });
                        }
                    }

                    else {
                        //Armazena no log de mensagens
                        settings.contacts[msgbody.userby].logMsg.push(msgbody);

                        if (settings.userTo == msgbody.userby && settings.chatIsOpen) {
                            printMessage(msgbody);
                        } else {

                            action.notification({
                                title: settings.contacts[msgbody.userby].name,
                                body: msgbody.msg + "\n " + msgbody.dtime,
                                dir: "ltr"
                            });
                        }
                    }
//                    }
                });
            }


////            if (msgbody) {
//                //TODO: Precisa modificar este tipo de tratamento na variável
////            $.each(ret, function (key, msgbody) {
//
//                //Distinguir grupo de usuario
//                if (msgbody.typeusr === "group") {
//                    // var userby = (settings.contacts[msgbody.userby]) ? settings.contacts[msgbody.userby].name : msgbody.userby;
//
//                    //Armazena no log de mensagens
//                    settings.contacts[msgbody.userto].logMsg.push(msgbody);
//
//                    if (settings.userTo === msgbody.userto) {
//
//                        printMessage(msgbody);
//                    }
//                    else {
//                        //TODO: Precisa arrumar
//                        // Notifica a mensagem
////                    action.Notification({
////                        title: settings.contacts[msgbody.userto].name,
////                        body: "(" + msgbody.userby + ") " + msgbody.msg + " - " + msgbody.dtime,
////                        dir: "ltr"
////                    });
//                    }
//                }
//                else {
//                    //Armazena no log de mensagens
//                    settings.contacts[msgbody.userby].logMsg.push(msgbody);
//                    
//                    if (settings.userTo == msgbody.userby) {
//                        printMessage(msgbody);
//
//                    } else {
//
//                        action.notification({
//                            title: settings.contacts[msgbody.userby].name,
//                            body: msgbody.msg + "\n " + msgbody.dtime,
//                            dir: "ltr"
//                        });
//                    }
//                }
//            });
//            }
        });
    };

    /**
     * Envia meu status
     * @param {type} status
     * @returns {undefined}
     */
    var sendStatus = function (status) {
        settings.status = status;
        var _data = action.requestServer({
            url: settings.server + "/sendStatus",
            data: {
                status: status,
                userId: settings.userId
            }
        });
    };

    /**
     * Receber status
     * @param {type} tdata
     * @returns {undefined}
     */
    var receiveStatus = function (tdata) {
        var _data = action.requestServer({
            url: settings.server + "/receiveStatus",
            data: {
                userId: settings.userId
            }
        });

        var data;

        if (tdata) {
            data = tdata;
        }

        $.each(data, function (name, status) {
            var aux = {};
            aux[name] = status;
            changeStatus(aux, true);
        });
    };

    /**
     * Recebe os contatos do servidor
     * @returns {undefined}
     */
    var receiveContacts = function () {

        var _data = action.requestServer({
            url: settings.server + "/receiveContacts",
            data: {
                userId: settings.userId
            }
        }).success(function (ret) {
            ret = JSON.parse(ret);

            $.each(ret, function (id, params) {
                //Registra contato na lista
                settings.contacts[id] = params;
                //TEMP: Trata erro de exibicao
                setTimeout(function () {

                    var icon = "";

                    if (settings.contacts[id].type == "group") {
                        icon = "<i class='fa fa-group'></i>&nbsp;&nbsp;&nbsp;";
                    } else {
                        icon = "<i class='fa fa-user'></i>&nbsp;&nbsp;&nbsp;";
                    }

                    if (!settings.contacts[id].logMsg) {
                        settings.contacts[id].logMsg = new Array();
                    }

                    $("#chat-contacts").append(
                            "<button id="
                            + id
                            + " class='btn btn-get btn-block btn-"
                            + id + "'>"
                            + icon
                            + settings.contacts[id].name
                            + "</button>");


                    var aux = {};
                    aux[id] = params.status;
                    changeStatus(aux, false);

                }, 100);
            });
        });
    };
    /**
     * Constroi o HTML da Pagina de contatos
     * @returns {undefined}
     */
    var buildHtml = function () {
        //Recebe o html
        var data = action.requestServer({
            url: settings.server + "/getHtml"
        });

        data.success(function (data) {
            var $messenger = $(".messenger");
            $messenger.append(data);
            settings.messengerWidth = $(".messenger").width();

            var topo = $(".navbar").height();
            var doc = $(document).height() - topo - 5;

            //Calcula tamanho da janela de contatos
            $messenger.height(doc).css("top", topo);
            $("#messenger-box").height(doc).css("top", topo);

            $(".chat-window").hide();

            if (!settings.open) {
                $messenger.hide().css("opacity", "0");
            }

            $("#username").html(settings.userName);

            //Armazena o chat em backup, para restaurar 
            //sempre que a janela do usuario for aberta
            settings.backupChat = $(".chat-window").html();
        });
    };
    /**
     * Constroi o HTML da pagina de conversa
     * @param {type} user
     * @returns {undefined}
     */
    var buildConversation = function (user) {

        //Define o usuário desta conversa no modo global
        settings.userTo = user;
        //Restaura o backup do chat e joga resultado no DOM
        $(".chat-window").html(settings.backupChat);

        //Troca parametros visíveis na janela
        $("#nameusr").text(settings.contacts[user].name);
        $(".panel-usr").removeClass("panel-usr").addClass("panel-" + user);
        $(".btn-usr").removeClass(".btn-usr").addClass("btn-" + user);

        //Define icone do usuario (Se for um grupo, este param será trocado abaixo)
        var icon = "";
        icon = "<i class='fa fa-group'></i>&nbsp;&nbsp;&nbsp;";

        //Se for um grupo, printar cada elemento deste na janela
        //e trocar icone
        if (settings.contacts[user].type === "group") {
            //Printa usuarios participantes

            //TODO. PROBLEMAS AQUI
            $.each(settings.contacts[user].contatosDoGrupo, function (key, contato) {
                $("#chat-group-users").text($("#chat-group-users").text() + contato.name + ", ");
            });

            $("#chat-group-users").text($("#chat-group-users").text() + " eu.");

            //Define icone do grupo
            icon = "<i class='fa fa-user'></i>&nbsp;&nbsp;&nbsp;";
        }

        var sizeTotal = $("#page-wrapper").height();
        var heading = $(".panel-heading").height() + 2 * 10;
        var row0 = $(".row-0").height();
        var row2 = $(".row-2").height();
        var row3 = $(".row-3").height();
        var row4 = $(".row-4").height();
        //TODO: Espacamentos da div
        var espacos = 2 * 15 + 2 * 6 + 22;
        $(".chat-view").height(sizeTotal - (heading + row0 + row2 + row3 + row4 + espacos));


        //Define o status atual do usuário
        setTimeout(function () { //Trata erro de exibicao: temporario
            var aux = {};
            aux[user] = settings.contacts[user].status;
            changeStatus(aux, false);
        }, 1);

        //Pra cada mensagem, printar na tela
        $.each(settings.contacts[user].logMsg, function (key, values) {
            printMessage(values);
        });
        $(".chat-view").prepend("<div id='olds' class='col-md-12'></div>");
        
        $("#olds").prepend("<div class='col-md-6'><button id='show-old-today' class='btn btn-default btn-block'>Hoje</button></div>");
        $("#olds").prepend("<div class='col-md-6'><button id='show-old-week' class='btn btn-default btn-block'>7 Dias</button></div>");
        
    };

    /**
     * Prepara a construcao do mensageiro
     * (antes do buildHTML)
     * @returns {undefined}
     */
    var messenger = function () {
        $("body").append("<div class='" + settings.element + "'></div>");
        settings.element = $(settings.element);
    };
    /**
     * Metodos publicos
     * @param {Object} options
     * @returns {undefined}
     */
    return {
        init: function (options) {
            $.extend(settings, options, settings);
            messenger();

            whoIam();

            buildHtml();
            receiveContacts();
            events();

            setInterval(function () {
                receiveMessage();
            }, 5000);
            
            if($(".chat-view").scrollTop() == 0){
                console.log(".chat-view");
            }
        }
    };

})(window, document, jQuery, App.SETTINGS);

module.Cookie = (function (window, document, $, settings) {
    var defaults = {
        expires: 1
    };
    /**
     * Retorna a data de expiracao do cookie
     * @param {type} val
     * @returns {String}
     */
    var getExpires = function (val) {
        var d = new Date();
        d.setTime(d.getTime() + (val * 24 * 60 * 60 * 1000));
        return d.toGMTString();
    };

    /**
     * Métodos Públicos
     * @param {type} obj
     * @returns {undefined}
     */
    return {
        /**
         * Salva o cookie
         * @param {type} obj
         * @returns {undefined}
         */
        save: function (obj) {
            if (settings.cookies == undefined) {
                settings.cookies = {}
            }
            ;

            settings.cookies[obj.key] = obj.value;
        },
        /**
         * Denine um novo cookie
         * @param {type} cookie
         * @returns {undefined}
         */
        set: function (cookie) {
            cookie.expires = (cookie.expires) ? cookie.expires : defaults.expires;
            cookie.expires = d.toGMTString(cookie.expires);

            document.cookie =
                    cookie.name
                    + "="
                    + cookie.value
                    + "; expires="
                    + cookie.expires;
        },
        /**
         * Retorna o cookie
         * @param {type} cname
         * @returns {String}
         */
        get: function (cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ')
                    c = c.substring(1);
                if (c.indexOf(name) == 0)
                    return c.substring(name.length, c.length);
            }
            return "";
        }
    }

})(window, document, jQuery, window.App.SETTINGS);

module.Sidemenu = (function (window, document, $, settings) {

    $(document).on("click", "#toggle", function (e) {
        e.preventDefault();

        if ($(".sidebar").is(':visible')) {
            $('.sidebar').animate({'width': '0px'}, 'slow', function () {
                $('.sidebar').hide();
            });
            $('#page-wrapper').animate({
                'margin-left': '0px'
            }, 'slow');
        }
        else {
            $('.sidebar').show();
            $('.sidebar').animate({'width': '250px'}, 'slow');
            $('#page-wrapper').animate({
                'margin-left': '250px'
            }, 'slow');
        }
    });

})(window, document, jQuery, window.App.SETTINGS);