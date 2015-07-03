var options = {};

$(function () {

    $('#side-menu').metisMenu();

});
//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function () {
    $(window).bind("load resize", function () {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {

            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1)
            height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    $(document).on("click", "#side-menu a", function () {
        if ($(this).attr("href") == undefined) {

            var cache = $("a.active").parent().parent().parent().find("a:first");
            if ($("a.active").parent().parent().hasClass("nav-third-level")) {
                if (!$("a.active").parent().parent().parent().hasClass("active")) {
                    cache.addClass("active");
                } else {
                    cache.removeClass("active");
                }
            }

            var dad = $("a.active").closest("li.primary");

            if ($("a.active").closest("li.primary").hasClass("active")) {
                dad.find("a:first").removeClass("active");
            } else {
                dad.find("a:first").addClass("active");
            }
        }
        else {
            $("#side-menu").find("a").removeClass("active");
            $(this).addClass("active");
        }
    });
    
    $("#logo").width($(".sidebar-nav").width() - 30);

    var hideMenu = function () {
        $(".sidebar").width(60);
        $("#page-wrapper").css("margin-left", "60px");
        $(".sidebar-search").hide();

        var item = 0; //Contador

        $("#side-menu").find("li").each(function () {
            var classe = $(this).find("a");
            if (classe.find("i").attr("class") !== undefined) {

                classe.hide();

                var drop = "";
                var href = classe.attr("href");

                //Caso for um item de menu composto
                if (href !== undefined) {
                    //href="href='"+classe.attr("href")+"'";
                    href = classe.attr("href").toString();
                    href = href.replace(/'/g, "\'");
                    href = 'href="' + href + '"';
                } else {
                    href = '';
                    drop = "<i class='fa arrow'></i>";
                }

                var active = "";
                if (classe.hasClass("active")) {
                    active = "active";
                }

                //Adiciona o icone no menu
                classe.after('<a class=\"tmp ' + active + '" '
                        + ' data-num="'
                        + item + '" ' + href + '><i class="'
                        + classe.find("i").attr("class")
                        + '"></i>' + drop + '</a>');
                item++;
            }
            //Altera o status
            options.state = false;
        });
    };

    var showMenu = function () {
        $(".sidebar").width(250);
        $("#page-wrapper").css("margin-left", 250 + "px");
        $(".sidebar-search").show();

        $(".tmp").remove();
        $("#side-menu").find("li").find("a").show();
        $("#side-menu").find("li").find("a").eq(options.itemSel).parent().addClass("active");

        options.state = true;
    };

    options.state = true;
    options.canClick = true;
    $(document).on("click", "#menu-hide", function () {
        if (options.canClick) {
            $(this).addClass("active");

            hideMenu();
            options.canClick = false;
        } else {
            $(this).removeClass("active");

            showMenu();
            options.canClick = true;
        }
    });

    $(document).on("click", ".tmp", function () {
        options.itemSel = $(this).attr("data-num");
        if ($(this).attr("href") === undefined) {
            showMenu();
        }
//        if ($(this).attr('href') !== undefined) {
//            showMenu();
//        }

//        if ($(this).parent().hasClass("primary")) {
//            //para abrir
//            $(".sidebar").width(250);
//            $("#page-wrapper").css("margin-left", 250 + "px");
//            $(".sidebar-search").show();
//
//            $(".tmp").remove();
//            $("#side-menu").find("li").find("a").show();
//
//            options.state = true;
//        }

//        $("#menu-hide").click();
//        var posDiv = $(this).attr("data-num");
    });

    $(document).on("click", "#page-wrapper", function () {
        if (!options.canClick) {
            if (options.state) {
                hideMenu();
            }
        }
    });


    /*
     var url = window.location;
     var element = $('ul.nav a').filter(function() {
     return this.href == url || url.href.indexOf(this.href) == 0;
     }).addClass('active').parent().parent().addClass('in').parent();
     if (element.is('li')) {
     element.addClass('active');
     }
     */
});
