function changeArea(description, nameOnPicture, picture) {

    description = replaceUrlOnButton(description);
    $("#text-div").html(description);
    document.getElementById("name_on_picture").innerHTML = nameOnPicture;
    let pictureUrl = "url(/images/bot.jpg)";

    if (picture == 'false') {
        document.getElementById("picture").style.backgroundImage = pictureUrl;
    } else {
        pictureUrl = "url(" + picture + ")";
        document.getElementById("picture").style.backgroundImage = pictureUrl;
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
        //
        // console.log(activeNavBar);
        // console.log(activeNavBarHref);
        // console.log(activeTabPaneRegularity);
        console.log('activeTabPaneItem+++++');
        console.log(activeTabPaneItem);
        console.log('activeTabPaneItem+++++');


        let side = this.classList[3];

        if (activeTabPaneItem.length == 0 && activeTabPaneRegularity.find('.container').length > 1) {

            let hrefId = "#" + activeTabPaneRegularity.find('.container').find('.tab-pane ')[0].id;
            console.log('+++++++++++++');
            console.log(hrefId);
            console.log(activeTabPaneRegularity.find('.container'));
            console.log('+++++++++++++');
            checkedRadioAndShowTab(hrefId);    // Переход в первый итем (когда они не активны) при первом нажатии таба регулярити

            return;
        } else if (activeTabPaneRegularity.find('.container').length <= 1) {   // Переход по табам регулярити в случаее его пустаты
            console.log('------------');
            // console.log(hrefId);
            console.log(activeTabPaneRegularity.find('.container'));
            console.log('------------');
            console.log(activeTabPaneRegularity.find('.container'));
            navigatorRegularityTab(activeNavBar, side);
            return;
        }

        let falseMe = changeItems(activeTabPaneItem, side);
        if (falseMe === false) {
            navigatorRegularityTab(activeNavBar, side);  // Переключение табов при крайних итемах
        }
        console.log('___________________________________________________________________________________________');

    });

    function navigatorRegularityTab(activeNavBar, side) {
        let hrefTabRegularityId = '';

        if (side == 'next') {
            hrefTabRegularityId = activeNavBar.nextElementSibling.dataset.href;
        } else if (side == 'prev') {
            hrefTabRegularityId = activeNavBar.previousElementSibling.dataset.href;
        }

        hrefTabRegularityId = '#' + hrefTabRegularityId;
        checkedRadioAndShowTab(hrefTabRegularityId);
    }

    function changeItems(activeTabPaneItem, side) {

        let hrefId = navigatorSide(activeTabPaneItem[0], side);
        let currentActiveTab = activeTabPaneItem[0];
        hrefId = '#' + hrefId;
        let mainHrefId = hrefId;

        if (activeTabPaneItem.find('a').length >= 1) {// суб итемы
            if (activeTabPaneItem.find('.active ').length >= 1) {
                hrefId = navigatorSide(activeTabPaneItem.find('.active ')[0], side);
                currentActiveTab = activeTabPaneItem.find('.active ')[0];

                if (hrefId === undefined) {           // проверка на крайность суб итемов для перехода в след суб итем
                    if (mainHrefId == '#undefined') { // проверка на крайность интемов для перехода в следующий таб
                        return false;
                    }
                    checkedRadioAndShowTab(mainHrefId);
                    currentActiveTab.className = 'tab-pane fade';

                    return;
                }
                hrefId = "#" + hrefId;
                // Первый эллемент суб итемов
            } else if (side == 'next') {
                hrefId = "#" + activeTabPaneItem.find('.tab-pane ')[0].id;
            } else if (side == 'prev') {
                hrefId = "#" + activeTabPaneItem.find('.tab-pane ').last()[0].id;
            }
        }

        if (hrefId == '#undefined') {
            return false;
        }

        checkedRadioAndShowTab(hrefId);
    }

    function checkedRadioAndShowTab(hrefId) {

        let tabPaneHref = $('a[href$="' + hrefId + '"]');
        if (tabPaneHref[0].children[0] !== undefined) {
            tabPaneHref[0].children[0].checked = true;
        }
        tabPaneHref.tab('show');
        changeArea(tabPaneHref[0].dataset.description, tabPaneHref[0].dataset.name, tabPaneHref[0].dataset.picture)
    }

    function navigatorSide(activeTabPaneItem, side) {

        if (side == 'next') {

            return activeTabPaneItem.nextSibling.id;
        }
        if (side == 'prev') {
            if (activeTabPaneItem.parentNode.parentNode.parentNode.className == 'tab-pane fade'
                && activeTabPaneItem !== activeTabPaneItem.parentNode.parentNode.parentNode) {

                return activeTabPaneItem.parentNode.parentNode.parentNode.id;
            }

            return activeTabPaneItem.previousSibling.id;
        }
    }

    $("a").click(function () {
        $(this).tab('show');
        changeArea($(this)[0].dataset.description, $(this)[0].dataset.name, $(this)[0].dataset.picture);

    });
});





