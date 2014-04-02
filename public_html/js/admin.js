$(document).ready(function() {

    // Set .active on active link from url
    var location = window.location.href;
    $("#nav ul li a").each(function() {
       if($(this).attr("href") == location) {
           $(this).addClass("active");
       }
    });

    $('.nav li a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });


    //Page edit click

    $(".pageSelector").click(function(e) {
        e.preventDefault();
        var pageID = $(this).data("pageid");
        window.location = "/admin/pages/edit/"+pageID;
    });
});