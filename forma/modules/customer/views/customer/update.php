<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model forma\modules\customer\records\Customer */

$this->title = 'Изменить клиента: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Люди', 'url' => '/core/default/people'];
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="customer-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

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
<div class="form-group hidden" id="dialog">
    <?php if ($dialog !== null ):?>
        <?= $dialog->dialog ?>
    <?php else:?>
        <?= 'Диалог пуст' ?>
    <?php endif; ?>
</div>
</div>
