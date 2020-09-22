function changeArea(description, nameOnPicture, picture) {

    description = replaceUrlOnButton(description);
    $("#text-div").html(description);
    $("div#name_on_picture").html(nameOnPicture);
    let pictureUrl = "url(/images/bot.jpg)";


    if (picture == 'false') {
        $('div#picture').css('background-image', pictureUrl);
    } else {
        pictureUrl = "url(" + picture + ")";
        $('div#picture').css('background-image', pictureUrl);
    }

}

function replaceUrlOnButton(mainStr) {

    var resObr = mainStr.split("{{").length - 1;

    for (i = 0; i < resObr; i++) {
        mainStr = mainStr.replace("{{", "<a  style=\"color: blue;\"  \n" +
            "href=\"javascript:void(0)\"\n" +
            "class=\"btn btn-outline-secondary\" \n" +
            "type=\"button\" data-toggle=\"modal\" \n" +
            "data-target=\"#modal\" \n" +
            "onclick=\"$('#modal .modal-dialog .modal-content .modal-body').html(''); \n" +
            "$('<iframe src= ");

        mainStr = mainStr.replace("||", "?without-header'\n" +
            "                        + ' style=width:100%;height:500px ' \n" +
            "                        + 'frameborder=0 id=myFrame></iframe>')\n" +
            "                        .appendTo('#modal .modal-dialog .modal-content .modal-body');\">\n" +
            "                        <i class=\"fa fa-eye\"></i>");

        mainStr = mainStr.replace("}}", "</a>");
    }
    return mainStr;
}

$(document).ready(function () {

    $(".navigator").click(function () {
        let activeNavBar = $('.nav-tabs-custom').find('.active')[0];  // активный таб li
        let activeNavBarHref = activeNavBar.children[0].dataset.href;   // href ссылки в теге li (tab_regularity_14)
        let activeTabPaneRegularity = $('#' + activeNavBarHref);
        let activeTabPaneItem = activeTabPaneRegularity.find('.container').find('.active');

        let side = this.classList[3];
        if (activeTabPaneItem.length == 0 && activeTabPaneRegularity.find('.container').length > 1) {
            let hrefId = "#";
            if (side == 'next') {
                hrefId = hrefId + activeTabPaneRegularity.find('.container').find('.tab-pane ')[0].id;
            } else if (side == 'prev') {
                let childLength = activeTabPaneRegularity[0].children.length - 1;
                let lastItem = activeTabPaneRegularity[0].children[childLength].children[1].childElementCount - 1;
                activeTabPaneRegularity = activeTabPaneRegularity[0].children[childLength].children[1].children[lastItem].id;
                hrefId = hrefId + activeTabPaneRegularity;
            }
            changeBorderTopColor($('a[href$="' + hrefId + '"]'), true);
            checkedRadioAndShowTab(hrefId);    // Переход в первый итем (когда они не активны) при первом нажатии таба регулярити

            return;
        } else if (activeTabPaneRegularity.find('.container').length <= 1) {   // Переход по табам регулярити в случаее его пустаты
            navigatorRegularityTab(activeNavBar, side);

            return;
        }

        let falseMe = changeItems(activeTabPaneItem, side);
        if (falseMe === false) {
            for (let i = 0; i < activeTabPaneItem.length; i++) {
                deactivationTabPaneItem(activeTabPaneItem[i]);
            }
            navigatorRegularityTab(activeNavBar, side);  // Переключение табов при крайних итемах
        }
    });

    function deactivationTabPaneItem(activeTabPaneItem) {
        changeClassName(activeTabPaneItem);
        let hrefId = activeTabPaneItem.id;
        $('a[href$="' + hrefId + '"]').find('.check-radio')[0].checked = false;
    }

    function changeBorderTopColor(jQueryObjA, changeBorder) { //jQuery.fn.init [a.change-item, prevObject: jQuery.fn.init(1)]
        if (changeBorder == false) {
            // jQueryObjA.parent('.carousel-child').css({'border-top': ''});
        } else {
            // jQueryObjA.parent('.carousel-child').css({'border-top': '2px solid #3c8dbc'});
        }
    }

    function changeItems(activeTabPaneItem, side) {

        let hrefId = navigatorSide(activeTabPaneItem[0], side);
        let currentMainActiveTab = activeTabPaneItem[0];
        changeBorderTopColor($('a[href$="#' + currentMainActiveTab.id + '"]'), false);

        let currentActiveTabDatasetPrev = currentMainActiveTab.dataset.prev;
        hrefId = '#' + hrefId;
        let mainHrefIdSide = hrefId;
        let changeTopBorderHref = hrefId;

        if (currentActiveTabDatasetPrev == 'false') {
            if (mainHrefIdSide == '#undefined'
                && currentMainActiveTab !== $('.tab-pane')[1]) { // проверка на крайность интемов для перехода в следующий таб

                changeClassName(currentMainActiveTab);
                currentMainActiveTab.dataset.prev = true;

                return false;
            }

            currentMainActiveTab.dataset.prev = true;
            checkedRadioAndShowTab(mainHrefIdSide);

            return;

        }
        if (activeTabPaneItem.find('a').length >= 1) {// суб итемы
            changeBorderTopColor($('a[href$="#' + currentMainActiveTab.id + '"]'), true);
            if (activeTabPaneItem.find('.active ').length >= 1) {
                hrefId = navigatorSide(activeTabPaneItem.find('.active ')[0], side);
                let currentActiveTab = activeTabPaneItem.find('.active ')[0];

                if (hrefId === undefined) {           // проверка на крайность суб итемов для перехода в след суб итем
                    if (activeTabPaneItem.find('.active ').length >= 1 && side == 'prev') {
                        $('a[href$="#' + activeTabPaneItem.find('.active ')[0].id + '"]').find('.check-radio')[0].checked = false;
                        changeClassName(activeTabPaneItem.find('.active ')[0]);
                        checkedRadioAndShowTab(activeTabPaneItem[0].id);

                        if ($(".tab-pane")[1] !== currentMainActiveTab) {
                            currentMainActiveTab.dataset.prev = false;
                        }

                        return;
                    }
                    if (mainHrefIdSide == '#undefined') { // проверка на крайность интемов для перехода в следующий таб
                        changeClassName(activeTabPaneItem.find('.active ')[0]);
                        changeClassName(currentMainActiveTab);

                        return false;
                    }

                    checkedRadioAndShowTab(mainHrefIdSide);
                    $('a[href$="#' + currentActiveTab.id + '"]').find('.check-radio')[0].checked = false;
                    changeClassName(currentActiveTab);
                    changeBorderTopColor($('a[href$="#' + activeTabPaneItem[0].id + '"]'), false);
                    changeBorderTopColor($('a[href$="' + mainHrefIdSide + '"]'), true);

                    return;
                }
                changeTopBorderHref = '#' + activeTabPaneItem[0].id;
                hrefId = "#" + hrefId;
                // Первый эллемент суб итемов
            } else if (side == 'next') {
                hrefId = "#" + activeTabPaneItem.find('.tab-pane ')[0].id;
                changeTopBorderHref = '#' + activeTabPaneItem[0].id;
            } else if (side == 'prev') {
                if (mainHrefIdSide == '#undefined'
                    && currentMainActiveTab !== $('.tab-pane')[1]
                    && currentActiveTabDatasetPrev !== 'true') { // проверка на крайность интемов для перехода в следующий таб

                    changeClassName(currentMainActiveTab);

                    return false;
                }
                changeTopBorderHref = '#' + activeTabPaneItem[0].id;
                hrefId = "#" + activeTabPaneItem.find('.tab-pane ').last()[0].id;
            }
        }

        if (hrefId == '#undefined') {
            return false;
        }

        changeBorderTopColor($('a[href$="' + changeTopBorderHref + '"]'), true);
        checkedRadioAndShowTab(hrefId);
    }

    function scrollItemsDivs(tabPaneHref, childCount) {
        let divWhitScroll = tabPaneHref.tab()[0].offsetParent;
        let scrollChange = 200; // ширина дива в каруселе
        let scrollLength = 300;
        for (i = 1; i < childCount; i++) {
            if (tabPaneHref.tab()[0].offsetParent.children[i].children[0] == tabPaneHref.tab()[0]) {
                if (i > 1) {
                    divWhitScroll.scrollLeft = scrollChange * i - scrollLength;
                } else if (i <= 1) {
                    divWhitScroll.scrollLeft = 0;
                }
            }
        }
    }

    function checkedRadioAndShowTab(hrefId) {

        let tabPaneHref = $('a[href$="' + hrefId + '"]');
        let childCount = tabPaneHref.tab()[0].offsetParent.childElementCount;
        if (childCount > 3) { // ширина лока 800 т е вмещает 4 еллемента по 200
            scrollItemsDivs(tabPaneHref, childCount);
        }

        tabPaneHref.tab('show');
        if (tabPaneHref[0].children[0]) {
            tabPaneHref.find('.check-radio')[0].checked = true;
        }
        changeArea(tabPaneHref[0].dataset.description, tabPaneHref[0].dataset.name, tabPaneHref[0].dataset.picture);


    }

    function navigatorSide(activeTabPaneItem, side) {

        if (side == 'next') {

            return activeTabPaneItem.nextSibling.id;
        }
        if (side == 'prev') {

            return activeTabPaneItem.previousSibling.id;
        }
    }

    function navigatorRegularityTab(activeNavBar, side) {
        let hrefTabRegularityId = '';

        if (side == 'next') {
            hrefTabRegularityId = activeNavBar.nextElementSibling;
        } else if (side == 'prev') {
            hrefTabRegularityId = activeNavBar.previousElementSibling;
        }
        if (hrefTabRegularityId == null) { // проверка на крайность интемов для перехода в следующий таб
            return;
        }
        hrefTabRegularityId = '#' + hrefTabRegularityId.dataset.href;

        checkedRadioAndShowTab(hrefTabRegularityId);
    }

    $("a.change-item").click(function (event) {

        let currentActiveItemsTabs = $('.tab-pane.fade.active');
        let currentParentActiveItemsTabs = $('.tab-pane.fade.parent.active');

        let thisItemTabParentClass = $('div[id$="' + this.dataset.href + '"].parent');
        let thisItemTab = $('div[id$="' + this.dataset.href + '"]');
        let parent = thisItemTab.parents('.parent')[0];

        if (currentActiveItemsTabs.length > 1) {
            for (i = 0; i < currentActiveItemsTabs.length; i++) {
                if (currentActiveItemsTabs[i] !== parent) {
                    deactivationTabPaneItem(currentActiveItemsTabs[i]);
                }
            }
        }

        if (currentParentActiveItemsTabs.length > 0 && parent == undefined) {
            changeBorderTopColor($('a[href$="#' + currentParentActiveItemsTabs[0].id + '"]'), false);
        }

        if (thisItemTabParentClass.length > 0) {
            changeBorderTopColor($('a[href$="#' + this.dataset.href + '"]'), true);
        }

        checkedRadioAndShowTab(this.dataset.href);

        return false;

    });

    $("a.change-regularity").click(function (event) {

        let activeItems = $('.tab-content').find('.tab-pane.fade.active');
        if (activeItems.length > 0) {
            for (i = 0; i < activeItems.length; i++) {
                deactivationTabPaneItem(activeItems[i]);
            }
        }
        changeArea(this.dataset.description, this.dataset.name, this.dataset.picture);
    });


    function changeClassName(activeItem) {
        if (activeItem.className.indexOf('parent') !== -1) {
            activeItem.className = 'tab-pane fade parent';
        } else {
            activeItem.className = 'tab-pane fade';
        }
    }
});





