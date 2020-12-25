<?php

use forma\modules\core\components\StateActiveRecord;
use yii\widgets\Pjax;
use kartik\form\ActiveForm;
use forma\modules\core\widgets\DetachedBlock;

/**
 * @var StateActiveRecord $model
 * @var ActiveForm $form
 *
*/

?>

<?php

Pjax::begin(['id' => $id.'-pjax', 'enablePushState' => false, 'enableReplaceState' => false]);

if (Yii::$app->controller->action->id == 'index') {
    $js = <<<JS
        $(document).ready(function() {
            $('#$id-pjax').on('pjax:complete', function(xhr, textStatus, error, options) {
                // todo: Вынести
                if ($('#purchase-nomenclature-pjax').length > 0) {
                    $.pjax.reload({container: '#purchase-form-pjax'});
                } else if ($('#transit-nomenclature-pjax').length > 0) {
                    $.pjax.reload({container: '#transit-form-pjax'});
                } else if ($('#selling-nomenclature-pjax').length > 0) {
                    $.pjax.reload({container: '#selling-form-pjax'});
                } else if ($('#inventorization-table-pjax').length > 0) {
                     $.pjax.reload({container: '#inventorization-form-pjax'});
                }
            });
        });
JS;
    $this->registerJs($js);
}

?>

<?php DetachedBlock::begin([
    'example' => 'Состояние',
]); ?>

<div class="operation-states">

<div class="row">
    <div class="col-md-12">
        <?php

        $statesList = $model->getStatesList();
        $disabledStatesList = array_diff_key($statesList, array_flip([$model->state]));

        $inputOptions = ['options' => [
            'successCssClass' => '',
            'class' => 'state-button',
        ]];

        $buttonOptions = [
            'disabledItems' => array_keys($disabledStatesList),
            'itemOptions' => [
                'labelOptions' => [
                    'class' => 'btn btn-success',
                    'style' => 'outline: none;',
                ],
            ],
        ];

        $form = ActiveForm::begin();

        echo $form->field($model, 'state', $inputOptions)
            ->radioButtonGroup($statesList, $buttonOptions)->label(false);

        ActiveForm::end();

        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <p><?= $model->getState()->getDescription() ?></p>
    </div>
</div>

<?php if ($model->getState()->getActions()): ?>
<div class="row operation-actions">
    <div class="col-md-12">
        <?php foreach ($model->getState()->getActions() as $name => $url) : ?>
            <a class="btn no-loader btn-success btn-xs" href="<?= strtolower($url) . '?id=' . $model->id ?>">
                <?= $name ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

</div>

<?php DetachedBlock::end(); ?>

<?php Pjax::end() ?>
