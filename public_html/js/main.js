$(document).ready(function() {
    if($(window).width() < 950) {
        $("#content table tr td:not(:has(img))").css("display","none");
    }

    $("#navIcon").click(function() {
       $("#normNav").slideToggle();
    });

    $("#nav ul li").click(function() {
        var goto = $(this).find("a").attr("href");
        window.location.href = goto;
    });

    var url = window.location.pathname;
        url = url.substring(url.lastIndexOf('/') + 1);

    if(url) {
        $("#nav ul li a").each(function() {
           if($(this).attr("href").indexOf(url) != -1) {
               $(this).addClass("active");
               $(this).closest("li").addClass("active");
           }
        });
    } else {
        $("#nav ul li:first").addClass("active");
    }
});