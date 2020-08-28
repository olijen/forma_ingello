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

            checkedRadioAndShowTab(hrefId);    // Переход в первый итем (когда они не активны) при первом нажатии таба регулярити

            return;
        } else if (activeTabPaneRegularity.find('.container').length <= 1) {   // Переход по табам регулярити в случаее его пустаты
            console.log('------------');
            console.log(activeTabPaneRegularity.find('.container'));
            console.log('------------');
            console.log(activeTabPaneRegularity.find('.container'));
            navigatorRegularityTab(activeNavBar, side);
            return;
        }


        let falseMe = changeItems(activeTabPaneItem, side, activeTabPaneRegularity);
        if (falseMe === false) {
            for (let i = 0; i < activeTabPaneItem.length; i++) {
                activeTabPaneItem[i].className = 'tab-pane fade';
                let hrefId = activeTabPaneItem[i].id;
                $('a[href$="' + hrefId + '"]')[0].children[0].checked = false;
            }
            navigatorRegularityTab(activeNavBar, side);  // Переключение табов при крайних итемах
        }
        console.log('___________________________________________________________________________________________');

    });


    function changeItems(activeTabPaneItem, side, activeTabPaneRegularity) {

        let hrefId = navigatorSide(activeTabPaneItem[0], side);
        let currentMainActiveTab = activeTabPaneItem[0];
        let currentActiveTabDatasetPrev = currentMainActiveTab.dataset.prev;
        hrefId = '#' + hrefId;
        let mainHrefIdSide = hrefId;

        if (currentActiveTabDatasetPrev == 'false') {
            if (mainHrefIdSide == '#undefined'
                && currentMainActiveTab !== $('.tab-pane')[1]
            ) { // проверка на крайность интемов для перехода в следующий таб
                console.log('32');
                currentMainActiveTab.className = 'tab-pane fade';
                currentMainActiveTab.dataset.prev = true;
                return false;
            }
            console.log('31');

            // let tabPaneHref = $('a[href$="' + hrefId + '"]');
            //
            //
            // console.log(tabPaneHref);
            // console.log(tabPaneHref.tab);
            // return;
            checkedRadioAndShowTab(hrefId);
            currentMainActiveTab.dataset.prev = true;

        }
        if (activeTabPaneItem.find('a').length >= 1) {// суб итемы
            if (activeTabPaneItem.find('.active ').length >= 1) {
                hrefId = navigatorSide(activeTabPaneItem.find('.active ')[0], side);
                let currentActiveTab = activeTabPaneItem.find('.active ')[0];
                if (hrefId === undefined) {           // проверка на крайность суб итемов для перехода в след суб итем
                    console.log('5555555');
                    if (activeTabPaneItem.find('.active ').length >= 1 && side == 'prev') {
                        $('a[href$="#' + activeTabPaneItem.find('.active ')[0].id + '"]')[0].children[0].checked = false;
                        activeTabPaneItem.find('.active ')[0].className = 'tab-pane fade';
                        checkedRadioAndShowTab(activeTabPaneItem[0].id);

                        if ($(".tab-pane")[1] !== currentMainActiveTab) {
                            currentMainActiveTab.dataset.prev = false;
                        }

                        return;
                    }
                    if (mainHrefIdSide == '#undefined') { // проверка на крайность интемов для перехода в следующий таб
                        activeTabPaneItem.find('.active ')[0].className = 'tab-pane fade';
                        currentMainActiveTab.className = 'tab-pane fade';
                        return false;
                    }
                    checkedRadioAndShowTab(mainHrefIdSide);
                    $('a[href$="#' + currentActiveTab.id + '"]')[0].children[0].checked = false;
                    currentActiveTab.className = 'tab-pane fade';
                    console.log('5');
                    return;
                }
                hrefId = "#" + hrefId;
                // Первый эллемент суб итемов
            } else if (side == 'next') {
                console.log('next');
                hrefId = "#" + activeTabPaneItem.find('.tab-pane ')[0].id;
            } else if (side == 'prev') {
                console.log('prev');
                if (mainHrefIdSide == '#undefined'
                    && currentMainActiveTab !== $('.tab-pane')[1]
                    && currentActiveTabDatasetPrev !== 'true') { // проверка на крайность интемов для перехода в следующий таб
                    console.log('32');
                    currentMainActiveTab.className = 'tab-pane fade';
                    return false;
                }
                console.log('prev2');

                hrefId = "#" + activeTabPaneItem.find('.tab-pane ').last()[0].id;
            }
        }

        if (hrefId == '#undefined') {
            return false;
        }

        checkedRadioAndShowTab(hrefId);
    }

    function checkedRadioAndShowTab(hrefId) {
        console.log('checkedRadioAndShowTab++++++++++++++++++++++++++++++++++');
        let tabPaneHref = $('a[href$="' + hrefId + '"]');
        console.log(tabPaneHref);
        console.log('checkedRadioAndShowTab++++++++++++++++++++++++++++++++++');
        tabPaneHref.tab('show');
        changeArea(tabPaneHref[0].dataset.description, tabPaneHref[0].dataset.name, tabPaneHref[0].dataset.picture);
        if (tabPaneHref[0].children[0]) {
            tabPaneHref[0].children[0].checked = true;
        }

    }

    function navigatorSide(activeTabPaneItem, side) {

        if (side == 'next') {

            return activeTabPaneItem.nextSibling.id;
        }
        if (side == 'prev') {
            
            console.log('prev22222222222');
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

    $("a").click(function () {

        checkedRadioAndShowTab(this.dataset.href);
        // $(this).tab('show');
        console.log(this.dataset.href);
        console.log($(this));
        // changeArea($(this)[0].dataset.description, $(this)[0].dataset.name, $(this)[0].dataset.picture);

    });
});





