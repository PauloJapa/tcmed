
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
        teste: function(){
            alert("hello");
        },
//        init: function () {
//
//            $(document).on("click", "#refresh", function () {
//                if (options.lastRequest) {
//                    action.processa(options.lastRequest);
//                }
//            });
//
////            var close = false
////            $(document).on("click", "#menu-hide", function () {
////                $("#side-menu").find("li").each(function () {
////                    if (close) {
////                        $(".sidebar").width(250);
////                        $(".sidebar-search").show();
////                        $("#page-wrapper").css({
////                            'margin-left': '250px'
////                        });
////                        var classe = $(this).find("a");
////
////                        if (classe.find("i").hasClass("fa")) {
////                            var aux = classe.find("i").attr("class");
////                            classe.html("");
////                            classe.append("<i class='" + aux + "'></i>");
////
////                            if (classe.parent().hasClass("primary")) {
////                                classe.append("<i class='fa arrow'></i>");
////                            }
////                        }
////                        close = false;
////                    } else {
////                        $(".sidebar").width(60);
////                        $(".sidebar-search").hide();
////                        $("#page-wrapper").css({
////                            'margin-left': '60px'
////                        });
////                        var classe = $(this).find("a");
////
////                        if (classe.find("i").hasClass("fa")) {
////                            var aux = classe.find("i").attr("class");
////                            classe.html("");
////                            classe.append("<i class='" + aux + "'></i>");
////
////                            if (classe.parent().hasClass("primary")) {
////                                classe.append("<i class='fa arrow'></i>");
////                            }
////                        }
////                        close = true;
////                    }
////                });
////            });
//
//        }
    };

})(jQuery, App.SETTINGS);



