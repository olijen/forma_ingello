var SelectModal = (function () {

    var $modal;

    var $content;

    var init = function () {
        $modal = $("div#select-modal");
        $content = $modal.find("div.modal-body").first();

        initViewLinks();

        attachLinks();
        attachSelects();
        attachForms();
    };

    var initViewLinks = function () {
        var $links = $("a.select-modal-link[data-action=view]");

        for (var i = 0; i < $links.length; i++) {
            var $link = $links.eq(i);
            var $select = $($link.attr("data-select"));

            changeViewLinkId($link, $select.val());
        }
    };

    var attachLinks = function () {
        var $body = $("body");
        $body.on("click", "a.select-modal-link[data-action=view]", viewLinkClickHandler);
        $body.on("click", "a.select-modal-link[data-action=create]", createLinkClickHandler);
    };

    var attachSelects = function () {
        $("body").on("change", "select", changeSelectHandler);
    };

    var attachForms = function () {
        $("body").on("submit", "form.select-modal-form", formSubmitHandler);
    };

    var formSubmitHandler = function (event) {
        event.preventDefault();
        saveForm($(this));
    };

    var saveForm = function ($form) {
        $.post($form.attr("action"), $form.serialize(), generateFormResponseHandler($form));
    };

    var generateFormResponseHandler = function ($form) {
        return function (response, statusText, xhr) {
            if (typeof response === "object") {
                var $select = $($form.attr("data-select"));
                selectNewRecord($select, response.id, response.name);
            } else {
                setContent(response);
            }
        };
    };

    var selectNewRecord = function ($select, id, name) {
        setSelectValue($select, id, name);
        $select.trigger("change");
        close();
    };

    var setSelectValue = function ($select, id, name) {
        var $option = $("<option></option>").attr("value", id).text(name);
        $select.append($option).val(id);
    };

    var linkClickHandler = function (event) {
        event.preventDefault();
    };

    var viewLinkClickHandler = function (event) {
        linkClickHandler(event);

        var $link = $(this);
        if (!linkIsEnabled($link)) {
            return false;
        }
        loadContent($link.attr("href"));
        open();
    };

    var createLinkClickHandler = function (event) {
        linkClickHandler(event);

        var $link = $(this);
        loadContent($link.attr("href"));
        open();
    };

    var changeSelectHandler = function (event) {
        var $select = $(this);

        var selectId = $select.attr("id");
        if (!selectId) {
            return false;
        }

        var $viewLinks = $("a.select-modal-link[data-action=view][data-select=#" + selectId + "]");
        if ($viewLinks.length == 0) {
            return false;
        }

        for (var i = 0; i < $viewLinks.length; i++) {
            var $link = $viewLinks.eq(i);
            changeViewLinkId($link, $select.val());
        }
    };

    var changeViewLinkId = function($link, id) {
        var url = $link.attr("href").split('?')[0];

        if (id) {
            url += "?id=" + id;
            enableLink($link);
        } else {
            disableLink($link);
        }

        $link.attr("href", url);
    };

    var enableLink = function ($link) {
        $link.attr("data-enabled", true);
        $link.removeClass("text-gray");
    };

    var disableLink = function ($link) {
        $link.attr("data-enabled", false);
        $link.addClass("text-gray");
    };

    var linkIsEnabled = function ($link) {
        return $link.attr("data-enabled") != "false";
    };

    var open = function () {
        $modal.modal("show");
    };

    var close = function () {
        $modal.modal("hide");
    };

    var clearContent = function () {
        $content.html("");
    };

    var setContent = function (content) {
        clearContent();
        $content.html(content);
    };

    var loadContent = function (url) {
        clearContent();
        $content.load(url);
    };

    init();

    return {
        open: open
    };
})();
