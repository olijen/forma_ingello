<?php

use yii\helpers\Url;
use kartik\color\ColorInput;
use forma\modules\core\components\LinkHelper;
use yii\bootstrap\Modal;
$menu = Yii::$app->params['menu'];

?>


<?php
$inputId = 0;

foreach ($menu as $itemMain): ?>
    <div style="padding: 5px; padding-left: 20px; border:1px solid #ccc;">
        <h2>
            <?= !empty($itemMain['icon']) ? '<i class="fa fa-' . $itemMain['icon'] . '"></i>' : '' ?>
            <?= !empty($itemMain['url']) ? '<a href="' . Url::to($itemMain['url']) . '">' . $itemMain['label'] . '</a>' : $itemMain['label'] ?>
        </h2>
    </div>

    <br>

    <?php if (!empty($itemMain['items'])) : $i = 0;
        foreach ($itemMain['items'] as $key => $item): ?>

            <?php
            $quantityDiv = isset($quantityDiv) ? $quantityDiv : 4;
            $colMd = isset($colMd) ? $colMd : 3;
            if ($i % $quantityDiv == 0): ?>
                <div class="row">
            <?php endif; ?>

            <div class="col-md-<?= $colMd ?>">
                <div onclick="setLabel('<?= $item['url'][0] ?>')" class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-<?= $item['icon']; ?>"></i></span>
                    <div class="info-box-content">

                        <strong class=""><?= $item['label'] ?></strong>

                        <span  class=""><?php LinkHelper::replaceUrlOnButton(" {{" . Url::to($item['url']) . "||" . $item['label'] . $key."}}") ?></span>

                        <?php echo LinkHelper::replaceUrlOnButton(' {{' . $item['url'][0] . '||Посмотреть функцию}}', null, '100%',$key); ?>
                        <button  class="btn btn-xs show-input btn-block" style="background: white;"
                                data-input='#input_<?= $inputId ?>'>
                            <span style=" border-bottom: 1px dashed green;color:#00a65a;line-height: 2em;"><i class="fa fa-code">Получить код кнопки</i></span>
                        </button>
                        <input style="width:100%" id='input_<?php echo $inputId;
                        $inputId++; ?>' type="hidden"
                               value="{{<?= Url::to($item['url']) ?>||<?= $item['label'] ?>}}"/>

                    </div>
                </div>
            </div>

            <?php $i++;
            if ($i % $quantityDiv == 0 || $i == count($itemMain['items'])): ?>
                </div>
            <?php endif; ?>

        <?php endforeach; endif; ?>

<?php endforeach; ?>

<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        $('button.show-input').click(function () {

            $(this).hide();
            $($(this).attr('data-input')).attr('type', ' ');

        })
    })

    function setLabel(url) {
        let findElementCreateRequest = document.querySelector('.modal-header');
        $.ajax({
            url : url+'?without-header&only-title',
            type : "GET",
            success : function(msg){
                findElementCreateRequest.innerHTML = "<p style='padding-left: 50px;'>" + msg + "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button></p>";
            }
        });

    }

</script>

