<?php use kartik\select2\Select2;
use forma\modules\selling\records\strategy\Strategy;
use forma\modules\selling\records\strategy\RequestStrategy;
?>
<?php
$this->title = Yii::t(
    'app', 'Речевые модули'
);
?>

<div class="row">
    <?php \forma\modules\core\widgets\DetachedBlock::begin(['example' => 'Работа с вопросами']) ?>
    <div style="width: 50%; float: left;padding-top: 30px;">
        <?php
        if (!empty($getWithoutEmptyStrategies)) {
            echo Select2::widget([
                'name' => 'Стратегия',
                'hideSearch' => true,
                'data' => $getWithoutEmptyStrategies,
                'options' => ['placeholder' => 'Выбрать стратегию...', 'onchange' => "myFunction()"],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]);
        }
        ?>
    </div>
    <div style="width: 20%;float: left;padding-top: 30px;margin-left:10px">
        <?php
        echo \yii\helpers\Html::a('Добавить стратегию', ['/selling/strategy/create'], ['class' => 'btn btn-block btn-success forma_blue']);
        ?>
    </div>
    <div style="width: 50%; float: left; padding-top: 30px" class="box-body">
        <div class="box-group" id="accordion">
            <div id="element"></div>
        </div>
    </div>
    <div style="width: 50%; float: right; padding-top: 30px"
    " class="box-body">
    <div class="box-group" id="accordionR">
        <div id="elementR"></div>
    </div>
</div>
<div style="width: 100%;float: left;">
</div>
<div style="width: 20%;float: left;padding-top: 30px;">
    <div id="elementCreateRequest"></div>
</div>
<script>
    $('.regularity_name').hover(function (event) {
        $(event.target).closest('.box-header').css('background-color', 'rgba(0, 200, 0, 0.15)');
    }, function (event) {
        $(event.target).closest('.box-header').css('background-color', 'transparent');
    })
    function myFunction() {
        var x = document.getElementById("w0").value;
        var elemCreateRequest = document.getElementById("elementCreateRequestE");
        if (elemCreateRequest != null) {
            elemCreateRequest.remove();
        }
        elemCreateRequest = document.createElement("div");
        elemCreateRequest.setAttribute("id", "elementCreateRequestE");
        console.log(x)
        if(x){
            elemCreateRequest.innerHTML = '<a class="btn btn-block btn-success forma_blue" href="/selling/request/create?strategyId='+x+'">Добавить вопрос</a>';
            var findElementCreateRequest = document.querySelector('#elementCreateRequest');
            findElementCreateRequest.parentNode.append(elemCreateRequest, findElementCreateRequest);
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
                var elemR = document.getElementById("Div2");
                if (document.getElementById("Div2") != null) {
                    elemR = document.getElementById("Div2");
                    elemR.remove();
                }
                elemR = document.createElement('div');
                elemR.setAttribute("id", "Div2");
                var listItemsTrueManager = data.map(function (requests) {
                    if (requests.is_manager == true) {
                                return `
                                    <div class="panel box box-success"
                                         style="margin-bottom: 5px;border-top-color:#58628e;">
                                        <div class="box-header with-border"
                                             style=" padding: 0">
                                            <h4 class="box-title" style="padding: 0 15px">
                                                <a href="/selling/request/update?id=` + requests.id + `">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="/selling/answer/create?id=` + requests.id + `">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <a href="/selling/request/delete?id=` + requests.id + `" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <a data-toggle="collapse" data-parent="#accordion"
                                                   href="#collapse_` + requests.id + `" class="regularity_name collapsed"
                                                   aria-expanded="false" style="display: inline-table; padding:15px 0;">
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
                                                                            <h4 class="box-title" style="padding: 0 15px">
                                                                                <a href="/selling/answer/update?id=` + answer.id + `">
                                                                                    <i class="fa fa-edit"></i>
                                                                                </a>
                                                                                <a href="/selling/answer/delete?id=` + answer.id + `" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
                                                                                    <i class="fa fa-trash"></i>
                                                                                </a>
                                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                                   href="#collapse_` + answer.id + requests.id + `" class="regularity_name collapsed"
                                                                                   aria-expanded="false" style="display: inline-table; padding:15px 0;">
                                                                                    | ` + answer.text + `
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapse_` + answer.id + requests.id + `"
                                                                             class="panel-collapse collapse"
                                                                             aria-expanded="false" style="height: 0px;">
                                                                            <div class="box-body">
                                                                                <div class="box-body">
                                                                                    <div class="box-group" id="accordion1">
                                                                                        ` + answer.text + `
                                                                                    </div>
                                                                                </div>
                                                                            </div>
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
                    if (requests.is_manager == false) {
                        return `
                                    <div class="panel box box-success"
                                         style="margin-bottom: 5px;border-top-color:#58628e;">
                                        <div class="box-header with-border"
                                             style=" padding: 0">
                                            <h4 class="box-title" style="padding: 0 15px">
                                                <a href="/selling/request/update?id=` + requests.id + `">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="/selling/answer/create?id=` + requests.id + `">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <a href="/selling/request/delete?id=` + requests.id + `" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <a data-toggle="collapse" data-parent="#accordion"
                                                   href="#collapse_` + requests.id + `" class="regularity_name collapsed"
                                                   aria-expanded="false" style="display: inline-table; padding:15px 0;">
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
                                                                            <h4 class="box-title" style="padding: 0 15px">
                                                                                <a href="/selling/answer/update?id=` + answer.id + `">
                                                                                    <i class="fa fa-edit"></i>
                                                                                </a>
                                                                                <a href="/selling/answer/delete?id=` + answer.id + `" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
                                                                                    <i class="fa fa-trash"></i>
                                                                                </a>
                                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                                   href="#collapse_` + answer.id + requests.id + `" class="regularity_name collapsed"
                                                                                   aria-expanded="false" style="display: inline-table; padding:15px 0;">
                                                                                    | ` + answer.text + `
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapse_` + answer.id + requests.id + `"
                                                                             class="panel-collapse collapse"
                                                                             aria-expanded="false" style="height: 0px;">
                                                                            <div class="box-body">
                                                                                <div class="box-body">
                                                                                    <div class="box-group" id="accordion1">
                                                                                        ` + answer.text + `
                                                                                    </div>
                                                                                </div>
                                                                            </div>
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
                if (listItemsTrueManager.length !== 0 && listItemsTrueManager.length !== countundefinedTrue)
                {
                    elem.innerHTML = '<p>Вопросы от менеджера</p>' + listItemsTrueManager.join('');
                }
                var countundefinedFalse = 0;
                for (var i = 0, l = listItemsFalseManager.length; i < l; i++) {
                    if (typeof (listItemsFalseManager[i]) == 'undefined') {
                        countundefinedFalse++;
                    }
                }
                if (listItemsFalseManager.length !== 0 && listItemsFalseManager.length !== countundefinedFalse)
                {
                    elemR.innerHTML = '<p>Вопросы от клиента</p>' + listItemsFalseManager.join('');
                }
                var target = document.querySelector('#element');
                var targetR = document.querySelector('#elementR');
                targetR.parentNode.append(elemR, targetR);
                target.parentNode.append(elem, target);
            },
            error: function (errormessage) {
                alert("not working" + errormessage);
            }
        });
    }
</script>
<?php \forma\modules\core\widgets\DetachedBlock::end() ?>
</div>
<div class="row">
    <?php \forma\modules\core\widgets\DetachedBlock::begin() ?>
    <div class="form-group">
        <?= \yii\helpers\Html::a('Быстрое добавление', ['/selling/answer/fast-create'], ['class' => 'btn btn-block btn-danger']) ?>
    </div>
    <div class="form-group">
        <?= \yii\helpers\Html::a('Смотреть ответы', ['/selling/answer'], ['class' => 'btn btn-block btn-success forma_blue']) ?>
    </div>
    <div class="form-group">
        <?= \yii\helpers\Html::a('Смотреть вопросы', ['/selling/request'], ['class' => 'btn btn-block btn-success forma_blue']) ?>
    </div>
    <div class="form-group">
        <?= \yii\helpers\Html::a('Смотреть стратегии', ['/selling/strategy'], ['class' => 'btn btn-block btn-success forma_blue']) ?>
    </div>
    <div class="form-group">
        <?= \yii\helpers\Html::a('Связать вопрос и стратегию', ['/selling/request-strategy'], ['class' => 'btn btn-block btn-success forma_blue']) ?>
    </div>
    <?php \forma\modules\core\widgets\DetachedBlock::end() ?>
</div>
