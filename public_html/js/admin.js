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


    // AJAX edit page post
    $("select.ajaxEdit").change(function() {
       ajaxEdit($(this).data("pageid"), 'active', $(this).val(), $(this).data("postto"));
    });
    $("input.ajaxEdit").blur(function() {
        ajaxEdit($(this).data("pageid"), 'name', $(this).val(), $(this).data("postto"));
    });
    $("img.ajaxEdit").click(function() {
       ajaxDelete($(this).data("pageid"), $(this).data("postto"));
    });
});

// AJAX delete page function
function ajaxDelete(ident, postto) {
    var data = {
        id: ident
    }
    $.ajax({
       url: postto,
        data: data,
        type: 'POST'
    }).done(function(data) {
        $("table tr[data-pageid="+ident+"]").fadeOut();
        $("#pageMessage").html(
            data
        );
        setTimeout(function() {
            $("#pageMessage").html("");
        }, 2000);
    });
}

// AJAX edit page function
function ajaxEdit(ident, field, value, postto) {
    var data = {
        id: ident,
        field: field,
        value: value
    }
    $.ajax({
       url: postto,
       data: data,
       type: 'POST'
    }).done(function(data) {
        $("#pageMessage").html(
            data
        );
        setTimeout(function() {
            $("#pageMessage").html("");
        }, 2000);
    }).fail(function(data) {
        $("#pageMessage").html(
            data
        );
        setTimeout(function() {
            $("#pageMessage").html("");
        }, 2000);
    });
}