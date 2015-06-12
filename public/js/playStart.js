var play = function () {
    var _pagin = null;
    var _loader = null;
    var _sender = null;
    var _mailbox = null;
    var _messenger = null;

    /* ============================= PAGIN ================================== */
    /**
     * Retorna a pagina com forms fixados
     * 
     * @returns {jQuery} html
     */
    var getPage = function () {
        //Fixa os dados no html
        fixDataForm();
        //Retorna html
        return $(_pagin.cont).html();
    };

    /**
     * Salva a pagina atual no cache
     * (Alternativa para ser chamado de dentro da classe)
     * 
     * @returns {undefined}
     */
    var savePageCache = function () {
        _pagin.pages.data[_pagin.cursor] = getPage();

    };

    /**
     * Salva a pagina atual no cache
     * (Alternativa para ser chamado de fora da classe)
     * 
     * @returns {undefined}
     */
    this.savePage = function () {
        if (_pagin) {
            savePageCache();
        }
    };

    /**
     * Fixa dados no html 
     * (Trata erro de salvar pagina)
     * 
     * @returns {undefined}
     */
    var fixDataForm = function () {
        //Transforma o container em objeto JQuery
        var cont = $(_pagin.cont);

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
     * Adiciona pagina no cache
     * 
     * @returns {undefined}
     */
    this.addPage = function () {
        if (_pagin) {
            //Se for a primeira posicao
            if (_pagin.cursor >= _pagin.iniArray) {
                //Habilita o botao back
                $(_pagin.back).attr("disabled", false);
            }
            //Incrementa cursor
            _pagin.cursor++;
            //Define fim do array
            _pagin.endArray = _pagin.cursor;
            //Salva a proxima pagina
            savePageCache();
            //Salva o item de menu da pagina
            _pagin.pages.menu[_pagin.cursor] = $(_pagin.menu).find("a.active");
            //Controla tamanho do array
            if (_pagin.endArray - _pagin.iniArray > _pagin.lenghtArray) {
                _pagin.iniArray++;
            }
            //Desabilita o botao next
            $(_pagin.next).attr("disabled", true);
        }
    };

    /**
     * Metodo de gerenciamento dos botoes de voltar pagina
     * e avançar pagina
     * 
     * @returns {undefined}
     */
    var managerClickPagin = function () {
        //Transforma os params em objetos JQuery
        var next = $(_pagin.next);
        var back = $(_pagin.back);
        var cont = $(_pagin.cont);

        //Desabilita os botoes de back e next
        back.attr("disabled", true);
        next.attr("disabled", true);

        //Eventos do botao back
        $(document).on("click", _pagin.back, function () {
            //Habilita o botao next
            next.attr("disabled", false);
            //Salva a pagina atual
            savePageCache();
            //decrementa cursor
            _pagin.cursor--;
            //Retorna a pagina salva anterior
            cont.html(_pagin.pages.data[_pagin.cursor]);
            //Clica no item de menu respectivo a pagina
            $(_pagin.pages.menu[_pagin.cursor]).click();
            //Se for a primeira posicao, desabilita o botao voltar
            if (_pagin.cursor == _pagin.iniArray) {
                back.attr("disabled", true);
            }
        });

        $(document).on("click", _pagin.next, function () {
            //Habilita o botao back
            back.attr("disabled", false);
            //Salva a pagina atual
            savePageCache();
            //Incrementa cursor
            _pagin.cursor++;
            //Retorna a proxima pagina salva 
            cont.html(_pagin.pages.data[_pagin.cursor]);
            //Clica no item de menu respectivo a pagina
            $(_pagin.pages.menu[_pagin.cursor]).click();
            //Se for a ultima posicao, desabilita o botao avancar
            if (_pagin.cursor == _pagin.endArray) {
                next.attr("disabled", true);
            }
        });
    };
    /* ====================================================================== */
    /* ================================= LOAD =============================== */

    /**
     * Exibe/oculta loader 
     * (gif de carregamento de pagina)
     * 
     * @param {type} visible
     * @returns {undefined}
     */
    this.showLoader = function (visible) {
        if (_loader) {
            if (visible) {
                $(_loader.id).fadeIn("fast");
                //lockClick();
            } else {
                $(_loader.id).fadeOut("fast");
                //unlockClick();
            }
        }
    };

    /* ====================================================================== */
    /* ================================= ???? =============================== */

    /**
     * Transforma os campos de um formulario em objeto
     * (para quem acessa de dentro da classe)
     * 
     * @param {type} form
     * @returns {play.transformFormToObject@pro;value|String}
     */
    var transformFormToObject = function (form) {
        var aux = {};

        var form = $(form).serializeArray();

        $.each(form, function () {
            aux[this.name] = this.value || '';
        });
        return aux;
    };

    /**
     * Transforma os campos de um formulario em objeto
     * (Para quem acessa de fora da classe)
     * 
     * @param {type} form
     * @returns {undefined}
     */
    this.getInputsForm = function (form) {
        return transformFormToObject(form);
    };

    /**
     * Envia dados do servidor e retorna resposta
     * 
     * @param {type} obj
     * @returns {jqXHR}
     */
    this.sendToServer = function (obj) {
        if (_sender) {
            var params = {};

            if (obj.frm) {
                var form = $("#" + obj.frm);
                //Transforma o form em objeto
                params.data = transformFormToObject(form);
                params.type = "POST";
                params.url = _sender.path + obj.url;
            } else {
                params.type = "GET";
                params.url = _sender.path + obj.url + "?" + Math.ceil(Math.random() * 100000);
            }

            return $.ajax(params);
        }
    };

    /* ====================================================================== */
    /* ================================= MAIL =============================== */
    this.addMail = function (mail) {
        _mailbox.push(mail);
    };

    this.getMails = function () {
        var mails = "";
        for (var i = 0; i < _mailbox.length; i++) {
            mails += "<li><a href='#'>";
            mails += "<div>";
            mails += "<strong>"+_mailbox[i].name+"</strong>";
            mails += "<span class='pull-right text-muted'><em>"+_mailbox[i].date+"</em></span>";
            mails += "</div>";
            mails += "<div>"+_mailbox[i].content+"</div>"
            mails += "</a></li>";
            mails += "<li class='divider'></li>";
        }
        
        $(".dropdown-messages").prepend(mails);
    };

    /* ====================================================================== */

    /**
     * Método construtor da classe play
     * 
     * @type Function|undefined
     */
    this.init = function (args) {
        /*
         * Construtor do objeto _pagin
         */
        if (args.pagin) {

            _pagin = {
                next: "#gnext",
                back: "#gback",
                cont: "#inter",
                menu: "#menu-bar",
                iniArray: 1,
                cursor: 0,
                endArray: 0,
                lenghtArray: 9,
                pages: {
                    menu: {},
                    data: {}
                },
            };

            //Pra cada param, setar objeto
            $.each(args.pagin, function (key, val) {
                _pagin[key] = val;
            });

            //Salva a primeira pagina
            this.addPage();
            //Inicializa os eventos back e next
            managerClickPagin();
        }

        /*
         * Construtor do objeto _sender
         */
        if (args.sender) {
            _sender = {
                path: ""
            };

            //Pra cada param, setar objeto
            $.each(args.sender, function (key, val) {
                _sender[key] = val;
            });

        }
        ;

        /*
         * Construtor do objeto _loader
         */
        if (args.loader) {
            _loader = {
                id: "#loader",
                img: "img/loader.gif",
                css: {
                    position: "absolute",
                    width: "50px",
                    heigth: "50px",
                    top: "50%",
                    right: "40%",
                    display: "none"
                }
            };

            $.each(args.loader, function (key, val) {
                _loader[key] = val;
            });

            //Adiciona o loader no html
            $("body").prepend("<img id='" + _loader.id.replace("#", "") + "' src='" + _loader.img + "'>");
            //Define as regras de css
            $(_loader.id).css(_loader.css);
        }

        if (args.mailbox) {
            _mailbox = [];
        }
        
        if(args.messenger){
            _messenger = {
                
            };
            
            $(".container-fluid").append("<div id='messenger-box'>");
            $("#messenger-box").css({
                "background-color": "#eee",
                "border-left": "1px solid #ddd",
                "border-bottom": "1px solid #ddd",
                width: "270px",
                height: "500px",
                right: "0px",
                position: "absolute",
                top: "0px"
            });
        }
    };
};