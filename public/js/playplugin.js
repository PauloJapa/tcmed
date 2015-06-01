var $play;

var _pag = {
    back: "",
    next: "",
    container: "",
    cursor: 0,
    initial: 0,
    final: 0,
    limit: 9,
    pages: {}
};

$(function () {
    $play = new play({
        loader: {
            img: "/img/loader.gif",
        }
    });

});

function play(params) {
    if (params.loader) {
        $("body").prepend("<img id='loader' src='" + params.loader.img + "'>");
        
        var novoCss = {
            position: "absolute",
            width: "50px",
            heigth: "50px",
            top: "50%",
            right: "40%",
            display: "none"
        };        
        params.css = (params.css)? params.css:novoCss;

        $("#loader").css(novoCss);
    }
};

/**
 * 
 * @param {type} back : objeto 'voltar pagina'
 * @param {type} next : objeto 'avancar pagina'
 * @param {type} container : objeto que ira receber resultado
 * @returns {undefined}
 */
play.prototype.managerPag = function (back, next, container) {
    //Registra os objetos da pagina na api
    _pag.back = back;
    _pag.next = next;
    _pag.container = container;

    $(_pag.back).attr("disabled", "true");
    $(_pag.next).attr("disabled", "true");

    var getPage = function (position) {
        _pag.container.html(_pag.pages[position]);
    };

    //Eventos de back e next
    $(_pag.back).click(function () {
        _pag.next.removeAttr("disabled");

        _pag.cursor--;

        getPage(_pag.cursor);

        if (_pag.cursor == _pag.initial) {
            _pag.back.attr("disabled", "true");
        }
        ;

    });

    $(_pag.next).click(function () {
        _pag.back.removeAttr("disabled");

        _pag.cursor++;
        getPage(_pag.cursor);

        if (_pag.cursor == _pag.final) {
            _pag.next.attr("disabled", "true");
        }
        ;
    });
};

/**
 * 
 * @param {type} page
 * @returns {undefined}
 */
play.prototype.addPage = function (page) {
    //habilita o botao back
    $(_pag.back).removeAttr("disabled");

    if (_pag.cursor == _pag.limit) {
        _pag.pages[_pag.initial] = "";
        _pag.initial++;
        _pag.limit++;
    }

    if (_pag.cursor < _pag.final) {
        _pag.final = _pag.cursor;
    }

    _pag.pages[_pag.cursor] = page;
    _pag.cursor++;
    _pag.final++;

    $(_pag.next.attr("disabled", "true"));
};

/**
 * 
 * @param {type} obj
 * @returns {String}
 */
play.prototype.getInputsForm = function (obj) {
    var o = {};

    var a = $("#" + obj).serializeArray();

    $.each(a, function () {
        o[this.name] = this.value || '';
    });
    return o;
};

/**
 * 
 * @param {type} obj
 * @returns {jqXHR}
 */
play.prototype.sendToServer = function (obj) {
    var params = {};

    if (obj.frm) { //Se houver dados para enviar
        params.data = $play.getInputsForm(obj.frm);
        params.type = "POST";
        params.url = GLOBALSIS.path + obj.url;
    } else {
        params.type = "GET";
        params.url = GLOBALSIS.path + obj.url + "?" + Math.ceil(Math.random() * 100000);
    }

    return $.ajax(params);
};

/**
 * 
 * @param {type} time
 * @param {type} funcao
 * @returns {initTimeOut.timeOut}
 */
play.prototype.initTimeOut = function (time, funcao) {
    var timeOut = setTimeout(funcao, time);
    return timeOut;
};

/**
 * Funcao de exibição do gif de carregamento
 * @param {type} visible
 * @returns {undefined}
 */
play.prototype.showLoader = function (visible) {
    if (visible) {
        $("#loader").fadeIn("fast");
        lockClick();
    } else {
        $("#loader").fadeOut("fast");
        unlockClick();
    }
};