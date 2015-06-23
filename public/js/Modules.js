window.App = {
    settings: {},
    modules: {}
};

var modules = window.App.modules;

modules.Pagination = (function (window, document, $, settings) {
    
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