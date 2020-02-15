$(function() {

    $(".list-card-btn").on("click", function(event) {
        event.preventDefault();
        event.stopPropagation();

        var $btn = $(this);
        var $link = $btn.attr("data-link");
        var $method = $btn.attr("data-method"); // get or post

        if (!$link || !$method) {
            return false;
        }

        if ($method.toLowerCase() == "get") {
            window.location.href = $link;
        } else if ($method.toLowerCase() == "post") {
            $.post($link)
        }
    });
});
