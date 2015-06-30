
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
        settings: {},
        events: {}
    };
}
else {
    window.App.events = {};
}
;
var event = window.App.events;

event = (function ($, options) {

    return {
        init: function(){
            
            $(document).on("click", "#refreshPage", function(){
                if(options.lastRequest){
                    
                    action.processa(options.lastRequest);
                    
                }
            });
            
        }
    };

})(jQuery, App.SETTINGS);



