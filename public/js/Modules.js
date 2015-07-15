
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
        $(window).html()

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
        userMsgStatus: "Hey there, I'm here!",
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
        /**
         * @type $
         */
         var $doc = $(document);
        /**
         * Executa acoes do onClick
         * @version 1.0
         * @author Danilo Dorotheu
         * @param {jQuery|String} attr Elemento DOM que sera observado
         * @param {function} exec Funcao de execucao quando ocorrencia ocorre
         */
         function $click(attr, exec) {
            return $doc.on("click", attr, exec);
        }
        /**
         * Executa acoes do onKeyUp
         * @version 1.0
         * @author Danilo Dorotheu
         * @param {jQuery|String} attr Elemento DOM que sera observado
         * @param {function} exec Funcao de execucao quando ocorrencia ocorre
         */
         function $keyup(attr, exec) {
            return $doc.on("keyup", attr, exec);
        };
        /**
         * Executa acoes de clickOut do elemento
         * @version 1.0
         * @author Danilo Dorotheu
         * @param {jQuery|String} $container Elemento DOM que sera observado
         * @param {function} exec Funcao de execucao quando ocorrencia ocorrer
         */
         function $clickOut($container, exec) {
            $container = $($container);
            $doc.mouseup(function (e) {
                if (!$container.is(e.target) // if the target of the click isn't the container...
                        && $container.has(e.target).length === 0) // ... nor a descendant of the container
                {
                    exec();
                }
            });
        };
        /**
         * Enviar mensagem
         * @author Danilo Dorotheu
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
        });

        /**
         * Troca status do usuario para ocupado
         * @returns {undefined}
         */
         $click(".setBusy", function () {
            changeMeStatus("busy");
            sendStatus("busy");
        });

        /**
         * Troca status do usuario para offline
         * @returns {undefined}
         */
         $click(".setOffline", function () {
            changeMeStatus("offline");
            sendStatus("offline");
        });

        /**
         * Abre a conversa com um contato/ grupo
         * @returns {undefined}
         */
         $click(".btn-get", function () {
            //Remove o alerta da mensagem
            if($(this).find("i").hasClass('alertMsg')){
                $(this).find("i").removeClass('alertMsg');
            }

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

            if($(this).find("i").hasClass('alertMsg')){
                $(this).find("i").removeClass('alertMsg');
            }

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

        /**
         * Fecha messenger se usuario clicar fora da tela
         */
         $clickOut(".messenger", function () {
            if ($(".messenger").is(":visible")) {
                $("#messenger").click();
            }
        });

         $click("#show-old-today", function () {
            getHistory("today", settings.userTo);
        });

         $click("#show-old-week", function () {
            getHistory("week", settings.userTo);
        });

         $click("#show-old-month", function () {
            getHistory("month", settings.userTo);
        });
        /**
         * 
         * @param  {[type]}
         * @return {[type]}
         */
         $click("#changeStatus", function(){
            $("#msgstatus").hide();
            $("#changMsgStatus").val($("#msgstatus").html());
            $("#changMsgStatus").show();
        });
        /**
         * Envia a mensagem com o Enter
         * @author Danilo Dorotheu
         * @version 1.0
         */
         $keyup("#changMsgStatus", function (e) {
            if (e.keyCode === 13){

                var newStatus = $("#changMsgStatus").val();
                $("#msgstatus").html(newStatus);

                action.requestServer({
                    url:settings.server,
                    control: "/editMsgStatus",
                    type:"POST",
                    data: {
                        userId: settings.userId,
                        statusMsg: newStatus
                    }
                }).success(function(){
                    $("#changMsgStatus").hide();
                    $("#msgstatus").show();
                });

                e.preventDefault();
            }
        });

    }; //!events

    /**
     * Solicita ao servidor o nome e o ID do 
     * usuario da sessao
     * @author Danilo Dorotheu
     */
     var whoIam = function () {
        action.requestServer({
            url: settings.server,
            control: "/whoiam"
        }).success(function (ret) {
            ret = JSON.parse(ret);
            settings.userMsgStatus = ret.msgstatus;
            settings.userId = ret.userid;
            settings.userName = ret.username;
        });
    };

    /**
     * Altera o Status do(s) Contato(s)
     * @param {Object} data id:status do usuario
     * @param {boolean} notify Habilita a notificacao
     * @author Danilo Dorotheu
     * @version 1.0
     */
     var changeStatus = function (data, notify) {

        var state = {
            "online": "success",
            "busy": "danger",
            "offline": "warning",
            "group": "primary"
        };

        var oldStatus;

        $.each(data, function (name, status) {
            oldStatus = settings.contacts[name].status;
            settings.contacts[name].status = status;
            console.log(">>" + oldStatus);

            $.each(state, function (k, classe) {
                $(".btn-" + name).removeClass("btn-" + classe);
                $(".panel-" + name).removeClass("panel-" + classe);
            });
            $(".btn-" + name).addClass("btn-" + state[status]);
            $(".panel-" + name).addClass("panel-" + state[status]);


            if (notify && settings.status !== "busy") {
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
                    case "online":
                    if(oldStatus == "offline"){
                        aux.body = "Entrou no chat";
                        action.notification(aux);
                    }
                    break;
                    case "busy":
                    if(oldStatus == "offline"){
                        aux.body = "Entrou no chat";
                        action.notification(aux);
                    }
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
        settings.status = status;

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
            url: settings.server,
            control: "/sendMsg",
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
            if (!settings.contacts[settings.userTo].logMsg) {
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
        var histButtons = action.outerHTML($(".chat-view").find(".row:first"));
        var data = {
            period: periodo,
            userId: settings.userId,
            from: from,
        };

        if (from.indexOf("gr") > -1) {
            data.userTo = action.getKeyContact(settings.contacts[from].contatosDoGrupo);
        }
        ;

        action.requestServer({
            url: settings.server,
            control: "/getHistory",
            type: "POST",
            data: data

        }).success(function (ret) {
            ret = JSON.parse(ret);
            $(".chat-view").html(""); //Limpa o chatview

            $.each(ret, function (chave, valor) {
                printMessage(valor);
            });

            $(".chat-view").prepend(histButtons);
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
            url: settings.server,
            control: "/receiveMsg",
            type: "POST",
            data: {
                userId: settings.userId
            }
        }).success(function (ret) {
            var objmsg = JSON.parse(ret);

            if (objmsg) {
                $.each(objmsg, function (key, msgbody) {

                    if(!$(".messenger").is(':visible') 
                        && settings.status !== "busy"){
                        $("#messenger").find("i").addClass('alertMsg');
                }

                if (msgbody.userto.indexOf("gr") > -1) {
                        //Alerta mensagem
                        $("#" + msgbody.userto).find("i").addClass("alertMsg");

                        //Armazena no log de mensagens
                        settings.contacts[msgbody.userto].logMsg.push(msgbody);

                        if (settings.userTo == msgbody.userto && settings.chatIsOpen) {
                            printMessage(msgbody);
                        } else {
                            if(settings.status !== "busy"){
                                action.notification({
                                    title: settings.contacts[msgbody.userto].name,
                                    body: msgbody.msg + "\n " + msgbody.dtime,
                                    dir: "ltr"
                                });
                            }
                        }
                    }

                    else {
                        //Alerta mensagem
                        $("#" + msgbody.userby).find("i").addClass("alertMsg");
                        
                        //Armazena no log de mensagens
                        settings.contacts[msgbody.userby].logMsg.push(msgbody);

                        if (settings.userTo == msgbody.userby && settings.chatIsOpen) {
                            printMessage(msgbody);
                        } else {
                            if(settings.status !== "busy"){
                                action.notification({
                                    title: settings.contacts[msgbody.userby].name,
                                    body: msgbody.msg + "\n " + msgbody.dtime,
                                    dir: "ltr"
                                });
                            }
                        }
                    }
                });
}
});
};
    /**
     * Envia atualizacao de status do usuario
     * @param  {Object} status [{id do usuario, status do usuario}]
     * @author Danilo Dorotheu
     * @version 1.0
     */
     var sendStatus = function (status) {
        settings.status = status;

        action.requestServer({
            url: settings.server,
            control: "/sendStatus",
            type: "POST",
            data: {
                status: status,
                userId: settings.userId
            }
        });
    };
    /**
     * Solicita ao servidor, atualizacao do status e msg de status
     * dos contatos
     * @author Danilo Dorotheu
     * @version 1.0
     */
     var receiveStatus = function () {
        action.requestServer({
            url: settings.server,
            control: "/receiveStatus",
            type: "POST",
            data: {
                userId: settings.userId
            }
        }).success(function(ret){
            ret = JSON.parse(ret);

            $.each(ret, function(key, value){
                var currentUser = settings.contacts[key];

                //Seta o status do contato
                currentUser.msgstatus = value.msgstatus;
                if(settings.userTo == key){
                    $("#chat-group-users").text(currentUser.msgstatus);
                }

                var aux = {};
                aux[key] = value.status;

                if(value.status !== currentUser.status){

                    //Se o atual status for busy e o novo estado for online...
                    if(currentUser.status == "offline" && value.status == "offline"){
                        //Exibir mensagem
                        changeStatus(aux);
                    }else{
                        //Nao exibir mensagem
                        changeStatus(aux, true);
                    }
                }
            });
        });
    };
    /**
     * Recebe os contatos do servidor
     * @author Danilo Dorotheu
     * @version 1.0
     */
     var receiveContacts = function () {

        action.requestServer({
            url: settings.server,
            control: "/receiveContacts",
            type: "POST",
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
                    changeStatus(aux);

                }, 100);
            });
});
};
    /**
     * Constroi o HTML da Pagina de contatos
     * @author Danilo Dorotheu
     * @version 1.0
     */
     var buildHtml = function () {
        //Recebe o html
        var data = action.requestServer({
            url: settings.server,
            control: "/getHtml"
        }).success(function (data) {

            var $messenger = $(".messenger");
            $messenger.append(data);

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
            $("#msgstatus").html(settings.userMsgStatus);

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

            $.each(settings.contacts[user].contatosDoGrupo, function (key, contato) {
                $("#chat-group-users").text($("#chat-group-users").text() + contato.name + ", ");
            });

            $("#chat-group-users").text($("#chat-group-users").text() + " eu.");

            //Define icone do grupo
            icon = "<i class='fa fa-user'></i>&nbsp;&nbsp;&nbsp;";
        }else{
            console.log(settings.contacts[user].msgstatus);
            $("#chat-group-users").text(settings.contacts[user].msgstatus);
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

            setInterval(function () {
                receiveStatus();
            }, 5000);

            if ($(".chat-view").scrollTop() == 0) {
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

    var setCookie = function (cookie) {
        var d = new Date();
        cookie.expires = (cookie.expires) ? cookie.expires : defaults.expires;
        if(cookie.expires != '0'){
            d.setTime(d.getTime() + (cookie.expires * 24 * 60 * 60 * 1000));
            cookie.expires = d.toUTCString();
        }
        cookie.path = (cookie.path) ? cookie.path : '; path=/';
        document.cookie =
                cookie.name
                + "="
                + cookie.value
                + "; expires="
                + cookie.expires
                + cookie.path;
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
            setCookie(cookie);
        },
        erase: function (name) {
            document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/';
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

