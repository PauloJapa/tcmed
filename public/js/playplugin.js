var $play;

var _pag = {
    back: "",
    next: "",
    container: "",
    cursor: 0,
    initial: 0,
    final:0,
    limit: 9,
    pages: {},
};


$(function () {
    $play = new play();

});

function play() {
}
;

/**
 * 
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
        
        if(_pag.cursor == _pag.initial){
            _pag.back.attr("disabled", "true");
        };

    });

    $(_pag.next).click(function () {
        _pag.back.removeAttr("disabled");
        
        _pag.cursor++;
        getPage(_pag.cursor);
        
        if(_pag.cursor == _pag.final){
            _pag.next.attr("disabled", "true");
        };
        
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
        _pag.initial++;
        _pag.limit++;
    }
    
    if(_pag.cursor < _pag.final){
        _pag.final = _pag.cursor;
    }

    _pag.pages[_pag.cursor] = page;
    _pag.cursor++;
    _pag.final++;

    $(_pag.next.attr("disabled", "true"));

};

