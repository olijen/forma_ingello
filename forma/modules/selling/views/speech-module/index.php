<?php use kartik\select2\Select2;
use forma\modules\selling\records\strategy\Strategy;
use forma\modules\selling\records\strategy\RequestStrategy;

?>
<?php
$this->title = Yii::t(
    'app', 'Речевые модули'
);
?>
<style>
    @media (max-width: 991px) {
        .col-md-6 {
            width: 100%;
        }

        .col-sm-3 {
            width: 100%;
        }
    }
</style>
<?php \forma\modules\core\widgets\DetachedBlock::begin(['example' => 'Стратегии']) ?>
<div class="row" onload="myFunction();">
    <div class="menu-strategy col-md-12" style="padding: 10px;">
        <div class="col-md-6 col-sm-12 col-xs-12" style="margin: 0 0 10px;">
            <?php
            if (!empty($getStrategiesUser)) {
                echo Select2::widget([
                    'name' => 'Стратегия',
                    'hideSearch' => true,
                    'data' => \yii\helpers\ArrayHelper::map($getStrategiesUser, 'id', 'name'),
                    'value' => $getStrategiesUser[0]['id'],
                    'options' => ['placeholder' => 'Выбрать стратегию...', 'onchange' => "myFunction()"],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
            } else {
                echo '<h3>У вас еще нет ни одной стратегии</h3>';
            }
            ?>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <?php
            echo \yii\helpers\Html::a('<i class="fa fa-plus" style="float: left"></i>Добавить стратегию', ['/selling/strategy/create?isSelling=' . $isSelling], ['class' => 'btn btn-block btn-success forma_blue']);
            ?>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <?php
            echo \yii\helpers\Html::a('<i class="fa fa-edit" style="float: left"></i>Редактировать стратегии', ['/selling/strategy?isSelling=' . $isSelling], ['class' => 'btn btn-block btn-success forma_blue']);
            ?>
        </div>
    </div>
    <div class="button-strategy col-md-12" style="padding: 10px;">
        <div id="accordion">
            <div id="element"></div>
        </div>
        <div id="accordionR">
            <div id="elementR"></div>
        </div>
    </div>
    <div class="button-strategy col-md-12" style="padding: 10px;">
        <div id="elementCreateRequest"></div>
        <div id="elementCreateRequestClient"></div>
    </div>
</div>
<?php \forma\modules\core\widgets\DetachedBlock::end() ?>



<script>
    $('.regularity_name').hover(function (event) {
        $(event.target).closest('.box-header').css('background-color', 'rgba(0, 200, 0, 0.15)');
    }, function (event) {
        $(event.target).closest('.box-header').css('background-color', 'transparent');
    })

    function myFunction() {
        var x = document.getElementById("w0").value;
        var elemCreateRequest = document.getElementById("elementCreateRequestE");
        var elemCreateRequestR = document.getElementById("elemCreateRequestR");
        if (elemCreateRequest != null) {
            elemCreateRequest.remove();
        }
        if (elemCreateRequestR != null) {
            elemCreateRequestR.remove();
        }
        elemCreateRequestR = document.createElement("div");
        elemCreateRequestR.setAttribute("id", "elemCreateRequestR");
        elemCreateRequest = document.createElement("div");
        elemCreateRequest.setAttribute("id", "elementCreateRequestE");
        console.log(x)
        if (x) {
            elemCreateRequest.innerHTML = '<div class="col-md-6 col-sm-6 col-xs-12"><a class="btn btn-block btn-success forma_blue" href="/selling/request/create?strategyId=' + x + '&isManager=0&isSelling=<?=($isSelling == 1) ? 1 : 0;?>"><i class="fa fa-plus" style="float: left"></i>Добавить вопрос от менеджера</a></div>';
            var findElementCreateRequest = document.querySelector('#elementCreateRequest');
            findElementCreateRequest.parentNode.append(elemCreateRequest, findElementCreateRequest);
            elemCreateRequestR.innerHTML = '<div class="col-md-6 col-sm-6 col-xs-12"><a class="btn btn-block btn-success forma_blue" href="/selling/request/create?strategyId=' + x + '&isManager=1&isSelling=<?=($isSelling == 1) ? 1 : 0;?>"><i class="fa fa-plus" style="float: left"></i>Добавить вопрос от <?=($isSelling == 1) ? "клиента" : "кадра"?></a></div>';
            var findElementCreateRequestR = document.querySelector('#elementCreateRequestClient');
            findElementCreateRequestR.parentNode.append(elemCreateRequestR, findElementCreateRequestR);
        }
        $.ajax({
            url: '/selling/speech-module/hash-for-event',
            type: 'POST',
            dataType: 'JSON',
            data: {"id": x},
            success: function (data) {
                var elem = document.getElementById("Div1");
                if (document.getElementById("Div1") != null) {
                    elem = document.getElementById("Div1");
                    elem.remove();
                }
                elem = document.createElement('div');
                elem.setAttribute("id", "Div1");
                elem.setAttribute("class", "col-md-6 col-sm-6 col-xs-12");
                var elemR = document.getElementById("Div2");
                if (document.getElementById("Div2") != null) {
                    elemR = document.getElementById("Div2");
                    elemR.remove();
                }
                elemR = document.createElement('div');
                elemR.setAttribute("id", "Div2");
                elemR.setAttribute("class", "col-md-6 col-sm-6 col-xs-12");
                var listItemsTrueManager = data.map(function (requests) {
                    if (requests.is_manager == false) {
                        return `
                                    <div class="panel box box-success"
                                         style="margin-bottom: 5px;border-top-color:#58628e;">
                                        <div class="box-header with-border">
                                            <h4 class="box-title" style="display: flex;padding: 10px 10px 10px">
                                                <a style="margin:0 5px 0;" href="/selling/request/update?id=` + requests.id + `<?= '&isSelling=' . Yii::$app->request->get('isSelling') ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a style="margin:0 5px 0;" href="/selling/answer/create?id=` + requests.id + `<?= '&isSelling=' . Yii::$app->request->get('isSelling') ?>">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <a style="margin:0 5px 0;" href="/selling/request/delete?id=` + requests.id + `<?= '&isSelling=' . Yii::$app->request->get('isSelling') ?>" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <a data-toggle="collapse" data-parent="#accordion"
                                                   href="#collapse_` + requests.id + `" class="regularity_name collapsed"
                                                   aria-expanded="false" style="display: inline-table; margin:0 5px 0;">
                                                    | ` + requests.text + `
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse_` + requests.id + `"
                                             class="panel-collapse collapse"
                                             aria-expanded="false" style="height: 0px;">
                                            <div class="box-body">
                                                <div class="box-body">
                                                    <div class="box-group" id="accordion1">
                                                        ` + requests.answers.map(function (answer) {
                                                                    return `
                                                                    <div class="panel box box-success"
                                                                         style="margin-bottom: 5px;border-top-color:#58628e;">
                                                                        <div class="box-header with-border"
                                                                             style=" padding: 0">
                                                                            <h4 class="box-title" style="display: flex; padding:20px 10px 20px">
                                                                                <a style="margin:0 5px 0;" href="/selling/answer/update?id=` + answer.id + `<?= '&isSelling=' . Yii::$app->request->get('isSelling') ?>">
                                                                                    <i class="fa fa-edit"></i>
                                                                                </a>
                                                                                <a style="margin:0 5px 0;" href="/selling/answer/delete?id=` + answer.id + `<?= '$isSelling=' . Yii::$app->request->get('isSelling') ?> " title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
                                                                                    <i class="fa fa-trash"></i>
                                                                                </a>
                                                                                <dev data-toggle="collapse" data-parent="#accordion"
                                                                                   href="#collapse_` + answer.id + requests.id + `" class="regularity_name collapsed"
                                                                                   aria-expanded="false" style="display: inline-table; margin:0 5px 0;color: grey">
                                                                                    | ` + answer.text + `
                                                                                </dev>
                                                                            </h4>
                                                                        </div>
                                                                    </div>`;
                                                        }).join('') + `
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                    }
                })
                var listItemsFalseManager = data.map(function (requests) {
                    if (requests.is_manager == true) {
                        return `
                                    <div class="panel box box-success"
                                         style="margin-bottom: 5px;border-top-color:#58628e;">
                                        <div class="box-header with-border">
                                            <h4 class="box-title" style="display: flex; padding:10px 10px 10px">
                                                <a style="margin:0 5px 0;" href="/selling/request/update?id=` + requests.id + `<?= '&isSelling=' . Yii::$app->request->get('isSelling') ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a style="margin:0 5px 0;" href="/selling/answer/create?id=` + requests.id + `<?= '&isSelling=' . Yii::$app->request->get('isSelling') ?>">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <a style="margin:0 5px 0;" href="/selling/request/delete?id=` + requests.id + `<?= '&isSelling=' . Yii::$app->request->get('isSelling') ?>" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <a data-toggle="collapse" data-parent="#accordion"
                                                   href="#collapse_` + requests.id + `" class="regularity_name collapsed"
                                                   aria-expanded="false" style="display: inline-table; margin:0 5px 0;">
                                                    | ` + requests.text + `
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse_` + requests.id + `"
                                             class="panel-collapse collapse"
                                             aria-expanded="false">
                                            <div class="box-body">
                                                <div class="box-body">
                                                    <div class="box-group" id="accordion1">
                                                        ` + requests.answers.map(function (answer) {
                                                                    return `
                                                                    <div class="panel box box-success"
                                                                         style="margin-bottom: 5px;border-top-color:#58628e;">
                                                                        <div class="box-header with-border"
                                                                             style=" padding: 0">
                                                                            <h4 class="box-title" style="display: flex; padding:20px 10px 20px">
                                                                                <a style="margin:0 5px 0;" href="/selling/answer/update?id=` + answer.id + `<?= '&isSelling=' . Yii::$app->request->get('isSelling') ?>">
                                                                                    <i class="fa fa-edit"></i>
                                                                                </a>
                                                                                <a style="margin:0 5px 0;" href="/selling/answer/delete?id=` + answer.id + `<?= '&isSelling=' . Yii::$app->request->get('isSelling') ?>" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
                                                                                    <i class="fa fa-trash"></i>
                                                                                </a>
                                                                                <div data-toggle="collapse" data-parent="#accordion"
                                                                                   href="#collapse_` + answer.id + requests.id + `" class="regularity_name collapsed"
                                                                                   aria-expanded="false" style="display: inline-table; margin:0 5px 0;color: grey">
                                                                                    | ` + answer.text + `
                                                                                </div>
                                                                            </h4>
                                                                        </div>
                                                                    </div>`;
                                                        }).join('') + `
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                    }
                })
                var countundefinedTrue = 0;
                for (var i = 0, l = listItemsTrueManager.length; i < l; i++) {
                    if (typeof (listItemsTrueManager[i]) == 'undefined') {
                        countundefinedTrue++;
                    }
                }
                if (listItemsTrueManager.length !== 0 && listItemsTrueManager.length !== countundefinedTrue) {
                    elem.innerHTML = '<p>Вопросы от менеджеров</p>' + listItemsTrueManager.join('');
                }
                var countundefinedFalse = 0;
                for (var i = 0, l = listItemsFalseManager.length; i < l; i++) {
                    if (typeof (listItemsFalseManager[i]) == 'undefined') {
                        countundefinedFalse++;
                    }
                }
                if (listItemsFalseManager.length !== 0 && listItemsFalseManager.length !== countundefinedFalse) {
                    elemR.innerHTML = '<p>Вопросы от <?=($isSelling == 1) ? "клиентов" : "кадров"?></p>' + listItemsFalseManager.join('');
                }
                if (listItemsTrueManager.length == 0 && listItemsTrueManager.length == countundefinedTrue && listItemsFalseManager.length == 0 && listItemsFalseManager.length == countundefinedFalse) {
                    elem.innerHTML = '<p>В этой стратегии диалога еще нет вопросов и ответов, сначала создайте вопрос</p>' + listItemsTrueManager.join('');
                }
                var target = document.querySelector('#element');
                var targetR = document.querySelector('#elementR');
                targetR.parentNode.append(elemR, targetR);
                target.parentNode.append(elem, target);
            },
            error: function (errormessage) {
                //alert("not working" + errormessage);
            }
        });
    }
    window.onload = myFunction;
</script>


