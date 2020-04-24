<?php
use yii\bootstrap\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use forma\modules\selling\records\selling\StateConfirm;
use forma\modules\core\widgets\DetachedBlock;

/**
 * @var Selling $model
 */

?>

    <style>
        .alert {
            align-items: flex-end;
            display: flex;
            flex-direction: column;
        }

        .alert span {
            display: block;
            text-align: left;
            width: 100%;
        }

        .alert p {
            background: #8374f7!important;
            border-radius: 5px;
            padding: 5px 10px;
            width: 90%;
        }
    </style>

<?php DetachedBlock::begin(['example' => 'История']); ?>
    <div class="row">
    <div class="col-md-12 form-group">
        <?php if(!is_null($talk)) echo  Html::a('Начать разговор', Url::to('/selling/strategy/talk?id='.$model->id), ['class' => 'btn btn-success', 'id' => 'selling-talk'])?>
        <?= Html::Button('История', ['class' => 'btn btn-success',  'id' => 'openDialog']) ?>
    </div>
    <div class="hidden" id="dialog">



        <?php Pjax::begin(['id' => 'dialog_mess'])?>
        <?= $model->dialog ?>

        <?= $form = Html::beginForm(['talk/comment-history'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>
        <div class="form-group">
            <?= Html::textarea('comment', '', ['rows' => 5, 'placeholder' => 'Оставьте комментарий к диалогу']) ?>
        </div>
        <?= Html::input('hidden', 'id', $model->id, ['rows' => 5]) ?>
        <?php
            if(isset($_GET['selling_token'])) echo Html::input('hidden', 'selling_token', $_GET['selling_token']);
        ?>
        <div class="form-group">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-success'])?>
        </div>
        <?= Html::endForm() ?>
        <?php Pjax::end()?>
        <?php /*$this->registerJs(<<<JS
function updateList() {
    console.log(1);
  $.pjax.reload({container: '#dialog_mess'});
}
setInterval(updateList, 4000);
JS
        )*/ ?>
    </div>
    <script>
        var flag = false;

        document.getElementById('openDialog').onclick = function () {
            if (flag === false) {
                document.getElementById('dialog').classList.remove('hidden');
                flag = true;
            } else {
                document.getElementById('dialog').classList.add('hidden');
                flag = false;
            }
        }
    </script>
<?php DetachedBlock::end() ?>