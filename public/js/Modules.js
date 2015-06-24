
if (!window.App) {
    window.App = {
        settings: {},
        modules: {},
    };
}
else {
    window.App.modules = {};
}
;

var module = window.App.modules;

module.Pagination = (function (window, document, $, settings) {

    /**
     * Definiçoes default do Pagination
     * -
     * @type Object
     */
    var defaults = {
        back: ".godown",
        next: ".goup",
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

})(window, document, jQuery, window.App.settings);



// =============================================================================
module.Messenger = (function (window, document, $, options) {

    var settings = {
        element: "messenger",
        userId: "username",
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
                $("#chat-send").click();
                e.preventDefault();
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
            $("#drop-chat")
                    .removeClass("offline")
                    .removeClass("busy")
                    .addClass("online");

            sendStatus("online");

            settings.notify = true;
        });

        /* Trocar status para ocupado */
        $(document).on("click", ".setBusy", function () {
            $("#drop-chat")
                    .removeClass("offline")
                    .removeClass("online")
                    .addClass("busy");

            sendStatus("busy");

            settings.notify = false;
        });

        /* Trocar status para offline */
        $(document).on("click", ".setOffline", function () {
            $("#drop-chat")
                    .removeClass("busy")
                    .removeClass("online")
                    .addClass("offline");

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
        $(document).on("click", "#drop-chat", function () {
            if (!settings.open) {
                $(".messenger").width($("#drop-chat").width() + $("#messenger-box").width() + 300);
                $("#drop-chat").css("margin-right", "0px");
            }
            $("#messenger-box").toggle("show", function () {
                if (!settings.open) {
                    $(".messenger").width($("#drop-chat").width());
                    $("#drop-chat").css("margin-right", "3px");
                }
            });
            settings.open = !settings.open;
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
     * Sistema de notificações Desktop
     * 
     * @param {object} options: {title, body, icon, dir}
     * @returns {undefined}
     */
    var notification = function (options) {
        if (settings.notify) {
            if (!("Notification" in window)) {
                errors.notificationError();
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
        }

    };

    /**
     * Envia requisicoes ao servidor
     * 
     * @returns {undefined}
     */
    var requestServer = function (data) {
        var actions = {
            getHtml: '/index'
        };
        return $.ajax({
            type: 'POST',
            url: settings.server + actions[data.type] + '?ajax=ok',
            data: data
        }).fail(function () {
            errors.serverNotFound(settings.server);
        });
    };

    /**
     * Enviar Mensagem
     * 
     * @returns {undefined}
     */
    var sendMessage = function () {
        var msg = $("#msg-chat").val();

        var message = {
            dtime: formatData(),
            msg: $.trim(msg),
            userby: settings.userId,
            userto: settings.userTo,
            typeusr: "user",
            type: "sendMsg"
        };

        var data = requestServer(message);

        data.success(function () {
            settings.contacts[settings.userTo].logMsg.push(message);
            printMessage(message);
        });

        $("#msg-chat").val("");
    };

    $.getPositionArray = function (array, key) {
        for (var i = 0; i < array.length; i++) {
            if (array[i] == key) {
                return i;
            }
        }
    };

    /**
     * 
     * @returns {undefined}
     */
    var printMessage = function (message) {
        if (message.type === "sendMsg") {
            $(".chat-view").append("<div class='msg-me'><em>(" + message.dtime + ") Eu digo:</em><br>" + message.msg + "</div>");
        }
        else {
            if (message.typeusr === "group") {
                var userby = (settings.contacts[message.userby]) ? settings.contacts[message.userby].name : message.userby;
                $(".chat-view").append(
                        "<div class='msg-"
                        + $.getPositionArray(settings.contacts[message.userto].usersgroup, message.userby)
                        + "'><em>(" + message.dtime + ") " + userby
                        + " Diz:</em><br>" + message.msg + "</div>");
            } else {

                $(".chat-view").append(
                        "<div class='msg-0'><em>(" + message.dtime + ") " + settings.contacts[message.userby].name
                        + " Diz:</em><br>" + message.msg + "</div>");
            }

        }

    };

    /**
     * Receber Mensagem
     * 
     * @returns {undefined}
     */
    var receiveMessage = function () {

//        var data = requestServer({
//            type: "receiveMsg",
//            userId: settings.userId
//        });

        var data = [
            {dtime: "09:53", typeusr: "user", msg: "Oi Danilo, tudo bem com você?", userto: "danilo_tcmed", userby: "paulo_tcmed"},
            {dtime: "09:55", typeusr: "group", msg: "Olá gente?", userto: "tcmed", userby: "paulo_tcmed"},
            {dtime: "11:00", typeusr: "group", msg: "Oi!", userto: "tcmed", userby: "kalini_tcmed"},
            {dtime: "11:00", typeusr: "group", msg: "Ola!", userto: "tcmed", userby: "danilo_tcmed"}
        ];

        $.each(data, function (key, msgbody) {
            //Distinguir grupo de usuario
            if (msgbody.typeusr === "group") {
                // var userby = (settings.contacts[msgbody.userby]) ? settings.contacts[msgbody.userby].name : msgbody.userby;

                //Armazena no log de mensagens
                settings.contacts[msgbody.userto].logMsg.push(msgbody);

                if (settings.userTo === msgbody.userto) {

                    printMessage(msgbody);
                }
                else {
                    // Notifica a mensagem
                    notification({
                        title: settings.contacts[msgbody.userto].name,
                        body: "(" + msgbody.userby + ") " + msgbody.msg + " - " + msgbody.dtime,
                        dir: "ltr"
                    });
                }
            }
            else {
                //Armazena no log de mensagens
                settings.contacts[msgbody.userby].logMsg.push(msgbody);

                if (settings.userTo === msgbody.userby) {
                    printMessage(msgbody);
                } else {

                    // Notifica a mensagem
                    notification({
                        title: settings.contacts[msgbody.userby].name,
                        body: msgbody.msg + "- " + msgbody.dtime,
                        dir: "ltr"
                    });
                }
            }
        });

        return data;
    };

    /**
     * Enviar Status
     * 
     * @returns {undefined}
     */
    var sendStatus = function (status) {
        settings.status = status;
        requestServer({
            type: "sendStatus",
            status: status,
            userId: settings.userId
        });
    };

    /**
     * Alterar o Status do(s) Contato(s)
     * 
     * @param {object} data 
     * @returns {undefined}
     */
    var changeStatus = function (data, canNotify) {
        canNotify = (canNotify == false) ? canNotify : true;
        console.info(JSON.stringify(data));

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
                        notification(aux);
                        break;
                    default:
                        aux.body = "Entrou no chat";
                        notification(aux);
                        break;
                }
            }
        });
    };

    /**
     * Receber Status Contatos
     * 
     * @returns {undefined}
     */
    var receiveStatus = function (tdata) {
//        var data = requestServer({
//            type: "receiveStatus",
//            userId: settings.userId
//        });
        var data = {
            "paulo_tcmed": "busy",
            "alan_tcmed": "offline"
        };

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
//        var data = requestServer({
//            type: "receiveContacts",
//            userId: settings.userId
//        });

        var data = {
            "paulo_tcmed": {
                name: "Paulo",
                type: "user",
                status: "offline"
            },
            "alan_tcmed": {
                name: "Alan",
                type: "user",
                status: "online"
            },
            "danilo_tcmed": {
                name: "Danilo",
                type: "user",
                status: "online"
            },
            "tcmed": {
                name: "Tecnomed",
                type: "group",
                status: "group",
                usersgroup: [
                    "paulo_tcmed",
                    "alan_tcmed",
                    "danilo_tcmed",
                    "kalini_tcmed"
                ]
            }
        };
        $.each(data, function (name, params) {
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
    };

    var buildHtml = function () {
        var data = action.requestServer({
            url: settings.server + "/index",
            data: {
                type: "getHtml"
            }
        });

        data.success(function (data) {
            $(".messenger").append(data);

            $(".chat-list").show();
            $(".chat-window").hide();

            $('.messenger').append('<div id="drop-chat"><i class="fa fa-weixin fa-2x"></i></div>');
            $("#drop-chat").addClass("online");

            var tamChatList = $('.chat-header-list').height();
            var tamDocument = $(document).height() - settings.topDifference;

            $(".messenger").css({
                "height": tamDocument,
                "top": settings.topDifference
            });

            $("#chat-contacts").css("height", tamDocument - tamChatList - 20);

            if (!settings.open) {
                $("#messenger-box").hide();
                $("#drop-chat").width($("#drop-chat").width());
            }
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
        //Restaura o backup do chat e joga resultado no dom
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

        //Define o usuário desta conversa no modo global
        settings.userTo = user;

        //Define o status atual do usuário
        setTimeout(function () { //Trata erro de exibicao: temporario
            var aux = {};
            aux[user] = settings.contacts[user].status;
            changeStatus(aux);
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

            buildHtml();
            receiveContacts();
            events();

        }
    };

})(window, document, jQuery, window.App.settings);

module.Cookie = (function (window, document, $, settings) {

    var Defaults = function () {
        this.name = "phpsession";
        this.expires = 1;
        this.value = "";
    }

    var d = new Date();
    var cookie = new Defaults();
    d.setTime(d.getTime() + (cookie.expires * 24 * 60 * 60 * 1000));

    function setCookie(cvalue) {
        cookie.value = cvalue;
        cookie.expires = d.toGMTString();
        settings.cookie = cookie;

        document.cookie = cookie.name + "=" + cookie.value + "; " + cookie.expires;
    }


    function getCookie(cname) {
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
    ;

    return {
        set: setCookie,
        get: getCookie
    }

})(window, document, jQuery, window.App.settings);
