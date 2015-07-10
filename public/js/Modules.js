
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
        userId: "1",
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
     * 
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
     * 
     * @returns {undefined}
     */
    var events = function () {
        /*Enviar mensagem*/
        $(document).on("click", "#chat-send", function () {
            sendMessage();
        });

        /*Enviar mensagem com enter*/
        $(document).on("keyup", "#msg-chat", function (e) {
            if (e.keyCode === 13) {
                if ($("#send-enter").is(":checked")) {
                    $("#chat-send").click();
                    e.preventDefault();
                }
            }
        });

        /* Exibir todos os usuários */
        $(document).on("click", ".view-all", function () {
            $(".show-users").find(".active").removeClass("active");
            $(this).addClass("active");
            $("#chat-contacts").find("button").show();
        });

        /* Exibir apenas usuarios onlines */
        $(document).on("click", ".view-online", function () {
            $(".show-users").find(".active").removeClass("active");
            $(this).addClass("active");
            $("#chat-contacts").find("button").hide();
            $("#chat-contacts").find(".btn-success").show();
            $("#chat-contacts").find(".btn-danger").show();
        });

        /* Exibir apenas grupos */
        $(document).on("click", ".view-groups", function () {
            $(".show-users").find(".active").removeClass("active");
            $(this).addClass("active");
            $("#chat-contacts").find("button").hide();
            $("#chat-contacts").find(".btn-primary").show();
        });

        /* Pesquisar usuários */
        $(document).on("keyup", "#text-search", function () {
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

        /* Trocar status para online */
        $(document).on("click", ".setOnline", function () {
            changeMeStatus("online")

            sendStatus("online");

            settings.notify = true;
        });

        /* Trocar status para ocupado */
        $(document).on("click", ".setBusy", function () {
            changeMeStatus("busy");

            sendStatus("busy");

            settings.notify = false;
        });

        /* Trocar status para offline */
        $(document).on("click", ".setOffline", function () {
            changeMeStatus("offline");

            sendStatus("offline");

            settings.notify = false;
        });

        /*Abrir conversa*/
        $(document).on("click", ".btn-get", function () {
            $(".chat-list").animate({
                opacity: 0
            }, "slow").hide();
            $(".chat-window").css("opacity", "0").show().animate({opacity: 1}, "fast");


            buildConversation($(this).attr("id"));
        });

        /*Voltar para lista*/
        $(document).on("click", "#chat-back", function () {
            $(".chat-window").animate({opacity: 0}, "fast").hide();
            $(".chat-list").show().animate({
                opacity: 1
            }, "slow");
        });

        /*Gerenciador de toggle da janela de chat*/
        $(document).on("click", "#messenger", function () {
            //Converte DOM em Obj Jquery 
            var $messenger = $(".messenger");

            if ($messenger.is(":visible")) {
                $messenger.animate({
                    opacity: 0
                }, "fast", function () {
                    $messenger.hide();
                });
            } else {
                $messenger.show();
                $messenger.animate({
                    opacity: 1
                }, "slow");
            }
        });
    };

    /**
     * 
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
     * Retorna a data formatada
     * 
     * @returns {String} data formatada
     */
    var formatData = function () {
        var d = new Date();
        return d.getHours() + ":" + d.getMinutes();
    };

    /**
     * Alterar o Status do(s) Contato(s)
     * 
     * @param {object} data 
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
     * Troca o status
     * @param {type} status
     * @param {type} notif
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
     * 
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
                dtime: formatData(),
            }
        };

        var _data = action.requestServer(message);

        _data.success(function () {
            settings.contacts[settings.userTo].logMsg = new Array();
            settings.contacts[settings.userTo].logMsg.push(message.data);

            printMessage(message.data);
        });

        $("#msg-chat").val("");
    };

    $.getPositionArray = function (array, key) {
        for (var i = 0; i < array.length; i++) {
            if (array[i] === key) {
                return i;
            }
        }
    };

    /**
     * 
     * @returns {undefined}
     */
    var printMessage = function (message) {
        console.log(JSON.stringify(message));
        //Se a mensagem for minha...

        if (message.userby == settings.userId) {
            console.log("here yes");
            $(".chat-view").append("<div class='msg-me'><em>(" + message.dtime + ") Eu digo:</em><br>" + message.msg + "</div>");
        }
        else {
            console.log("here not");
            $(".chat-view").append("<div class='msg-0'><em>(" + message.dtime + ") " + message.userby + " diz:</em><br>" + message.msg + "</div>");
        }

//        
//        if (message.type === "sendMsg") {
//            $(".chat-view").append("<div class='msg-me'><em>(" + message.dtime + ") Eu digo:</em><br>" + message.msg + "</div>");
//        }
//        
//        else {
//            if (message.typeusr === "group") {
//                console.log("group");
//                
//                var userby = (settings.contacts[message.userby]) ? settings.contacts[message.userby].name : message.userby;
//                $(".chat-view").append(
//                        "<div class='msg-"
//                        + $.getPositionArray(settings.contacts[message.userto].usersgroup, message.userby)
//                        + "'><em>(" + message.dtime + ") " + userby
//                        + " Diz:</em><br>" + message.msg + "</div>");
//            } else {
//                console.log("user");
//                $(".chat-view").append(
//                        "<div class='msg-0'><em>(" + message.dtime + ") " + settings.contacts[message.userto].name
//                        + " Diz:</em><br>" + message.msg + "</div>");
//            }
//
//        }

    };

    /**
     * Receber Mensagem
     * 
     * @returns {undefined}
     */
    var receiveMessage = function () {

        var _data = action.requestServer({
            url: settings.server + "/receiveMsg",
            data: {
//                userId: settings.userId
                userId: 2
            }
        }).success(function (ret) {
            ret = JSON.parse(ret);
            var msgbody = ret;

            //TODO: Precisa modificar este tipo de tratamento na variável
//            $.each(ret, function (key, msgbody) {

            //Distinguir grupo de usuario
            if (msgbody.typeusr === "group") {
                // var userby = (settings.contacts[msgbody.userby]) ? settings.contacts[msgbody.userby].name : msgbody.userby;

                //Armazena no log de mensagens
                settings.contacts[msgbody.userto].logMsg.push(msgbody);

                if (settings.userTo === msgbody.userto) {

                    printMessage(msgbody);
                }
                else {
                    //TODO: Precisa arrumar
                    // Notifica a mensagem
//                    action.Notification({
//                        title: settings.contacts[msgbody.userto].name,
//                        body: "(" + msgbody.userby + ") " + msgbody.msg + " - " + msgbody.dtime,
//                        dir: "ltr"
//                    });
                }
            }
            else {

                //Armazena no log de mensagens
                settings.contacts[msgbody.userby].logMsg.push(msgbody);

                if (settings.userTo == msgbody.userby) {
                    printMessage(msgbody);

                } else {

                    action.notification({
                        title: settings.contacts[msgbody.userby].name,
                        body: msgbody.msg + "\n " + msgbody.dtime,
                        dir: "ltr"
                    });
                }
            }
//            });
        });

//        var data = [
//            {dtime: "09:53", typeusr: "user", msg: "Oi Danilo, tudo bem com você?", userto: "danilo_tcmed", userby: "paulo_tcmed"},
//            {dtime: "09:55", typeusr: "group", msg: "Olá gente?", userto: "tcmed", userby: "paulo_tcmed"},
//            {dtime: "11:00", typeusr: "group", msg: "Oi!", userto: "tcmed", userby: "kalini_tcmed"},
//            {dtime: "11:00", typeusr: "group", msg: "Ola!", userto: "tcmed", userby: "danilo_tcmed"}
//        ];
//
    };

    /**
     * Enviar Status
     * 
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
     * Receber Status Contatos
     * 
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
     * 
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

            $.each(ret, function (name, params) {
                settings.contacts[name] = params;


                setTimeout(function () { //Trata erro de exibicao: temporario
                    var icon = "";
                    if (settings.contacts[name].type === "group") {
                        icon = "<i class='fa fa-group'></i>&nbsp;&nbsp;&nbsp;";
                    } else {
                        icon = "<i class='fa fa-user'></i>&nbsp;&nbsp;&nbsp;";
                    }

                    if (!settings.contacts[name].logMsg) {
                        settings.contacts[name].logMsg = new Array();
                    }

                    $("#chat-contacts").append("<button id=" + name + " class='btn btn-get btn-block btn-" + name + "'>" + icon + settings.contacts[name].name + "</button>")
                    var aux = {};
                    aux[name] = params.status;
                    changeStatus(aux, false);
                }, 100);
            });

        });
    };

    $.fn.outerHTML = function () {
        return $('<a>').append(this.eq(0).clone()).html();
    };

    $.fn.top = function (top) {
        $(this).css("top", top);
    };


    /**
     * Constroi o HTML da Pagina
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
            $messenger.height(doc).top(topo);
            $("#messenger-box").height(doc).top(topo);

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
     * 
     * 
     * @param {type} user
     * @returns {undefined}
     */
    var buildConversation = function (user) {
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
            $.each(settings.contacts[user].usersgroup, function (key, name) {
                name = (settings.contacts[name]) ? settings.contacts[name].name : name;

                $("#chat-group-users").text($("#chat-group-users").text() + name + ", ");
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


        //Define o usuário desta conversa no modo global
        settings.userTo = user;

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
    };

    /**
     * Prepara a construcao do mensageiro
     * (antes do buildHTML)
     * -
     * @returns {undefined}
     */
    var messenger = function () {
        $("body").append("<div class='" + settings.element + "'></div>");
        settings.element = $(settings.element);
    };

    /**
     * 
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
        }
    };

})(window, document, jQuery, App.SETTINGS);

module.Cookie = (function (window, document, $, settings) {

    var defaults = {
        expires: 1
    };

    var getExpires = function (val) {
        var d = new Date();
        d.setTime(d.getTime() + (val * 24 * 60 * 60 * 1000));
        return d.toGMTString();
    };

    /**
     * Métodos Públicos
     * -
     * @param {type} obj
     * @returns {undefined}
     */
    return {
        save: function (obj) {
            if (settings.cookies == undefined) {
                settings.cookies = {}
            }
            ;

            settings.cookies[obj.key] = obj.value;
        },
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