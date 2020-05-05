<?php
use yii\bootstrap\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use forma\modules\selling\records\selling\StateConfirm;
use forma\modules\core\widgets\DetachedBlock;

/**
 * @var Selling $model
 */

$dialog_block = 'hidden';

?>

<?php DetachedBlock::begin(['example' => 'История']); ?>
    <div class="row">
        <div class="col-md-12 form-group">
            <?php if(!is_null($talk)) echo  Html::a('Начать разговор', Url::to('/selling/strategy/talk?id='.$model->id), ['class' => 'btn btn-success', 'id' => 'selling-talk'])?>
            <?php if(isset($history) && !is_null($history)){ echo  Html::Button('История', ['class' => 'btn btn-success',  'id' => 'openDialog']); } else $dialog_block = ''?>
        </div>
        <?php include_once 'history_dialog.php'?>
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