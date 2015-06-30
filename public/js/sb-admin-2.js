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

    var state = true;
    var defWid;
    $(document).on("click", "#menu-hide", function () {
        if (!defWid) {
            defWid = $(".sidebar").width();
        }

        if (state) {
            //para fechar
            $(".sidebar").width(60);
            $("#page-wrapper").css("margin-left", "60px");
            $(".sidebar-search").hide();
            var item = 0;

            $("#side-menu").find("li").each(function () {
                var classe = $(this).find("a");
                if (classe.find("i").attr("class") !== undefined) {
                    classe.hide();
                    var drop = "";
                    var href = classe.attr("href");
                    if (classe.parent().hasClass("primary")) {
                        drop = "<i class='fa arrow'></i>";
                        href = "";
                    }

                    classe.after('<a class="tmp" href="'
                            + href + '" data-num="'
                            + item + '"><i class="'
                            + classe.find("i").attr("class")
                            + '"></i>' + drop + '</a>');
                    item++;
                }

            });
        } else {
            //para abrir
            $(".sidebar").width(defWid);
            $("#page-wrapper").css("margin-left", defWid + "px");
            $(".sidebar-search").show();

            $(".tmp").remove();
            $("#side-menu").find("li").find("a").show();
        }
        state = !state;
    });

    $(document).on("click", ".tmp", function () {
        $("#menu-hide").click();
        var posDiv = $(this).attr("data-num");
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
