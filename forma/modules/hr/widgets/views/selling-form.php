<?php

use forma\modules\hr\records\interview\Interview;
use forma\modules\hr\records\interview\StateDone;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use kartik\form\ActiveForm;
use yii\helpers\Html;
use forma\modules\worker\records\Worker;
use forma\modules\project\records\project\Project;
use forma\modules\vacancy\records\Vacancy;
use forma\modules\hr\records\interview\StateConfirm;
use yii\helpers\Url;
use forma\modules\core\widgets\DetachedBlock;
use kartik\select2\Select2;
use forma\components\ActiveRecordHelper;
use yii\web\JsExpression;

/**
 * @var Interview $model
 */
/* @var Vacancy $vacancy */

Pjax::begin(['id' => 'selling-form-pjax', 'enablePushState' => false]);

if (!Yii::$app->request->isPjax && !Yii::$app->request->isAjax) {
    $js = "
    $('document').ready(function() {
        $('#selling-form-pjax').on('pjax:complete', function(xhr, textStatus, error, options) {
            $.pjax.reload({container: '#selling-nomenclature-pjax'});
        });
    });
";
    $this->registerJs($js);
}

?>
<?php DetachedBlock::begin([
    'example' => 'Данные',
]); ?>

<div class="operation-form">

    <?php

    $formOptions = [
        'action' => Url::to(['/hr/form/save', 'id' => $model->id]),
        'options' => ['data-pjax' => '1'],
        'fieldConfig' => [
            'inputOptions' => [
                'class' => 'form-control',
//                'disabled' => $model->stateIs(new StateDone()),
            ],
        ],
    ];

    $form = ActiveForm::begin($formOptions);
    ?>
    <div class="alert alert-danger" id='alert-danger' role="alert" hidden
         style="position: absolute; width: 300px; float: left; top: -50%; z-index: 9991;">
        На данную вакансию нет ни одного заинтересованного кадра
    </div>
    <div class="row">
        <div class="col-md-4" id="worker-select">
            <?php
            $label = $model->getAttributeLabel('worker_id');
            $label .= '
                [<a
                    class="select-modal-link no-loader"
                    id="worker-view"
                    data-select="#interview-worker_id"
                    data-action="view"
                    href="' . Url::to(['/worker/worker/view']) . '"
                >детали</a>]
                [<a
                    class="select-modal-link no-loader"
                    data-select="#interview-worker_id"
                    data-action="create"
                    href="' . Url::to(['/worker/worker/create']) . '"
                >добавить</a>]
            ';
            ?>
            <?php if (Yii::$app->request->get('vacancyId')) {
                $data = \forma\modules\worker\records\workervacancy\WorkerVacancy::getListWorker(Yii::$app->request->get('vacancyId'));
            } else {
                $data = ArrayHelper::map(Worker::getListQuery()->all(), 'id', 'fullName');
            }
            ?>

            <?= $form->field($model, 'worker_id')->widget(Select2::classname(), [
                'data' => $data,
                'options' => ['placeholder' => 'Поиск в базе'],
                'pluginOptions' => ['allowClear' => true],
            ])->label($label) ?>
        </div>
        <div class="col-md-4">
            <?php //TODO: !!!!!!!!!!!!!!!! WORKER to VACANCY

            $label = $model->getAttributeLabel('vacancy_id');
            $label .= '
                [<a
                    class="select-modal-link no-loader"
                    data-select="#interview-vacancy_id"
                    data-action="view"
                    href="'.  Url::to(['/vacancy/vacancy/view-vacancy-project']).'" 
                >детали</a>]
                [<a
                    class="select-modal-link no-loader"
                    data-select="#interview-vacancy_id"
                    data-action="create"
                    href="' . Url::to(['/project/project-vacancy/create']) . '"
                >добавить</a>]
            ';
            ?>
            <?= $form->field($model, 'vacancy_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map($vacancy, 'id', 'name'),
                'options' => ['placeholder' => 'Поиск в базе'],
                'pluginOptions' => ['allowClear' => true],
            ])->label($label) ?>
        </div>
        <?php if ($model->isNewRecord): ?>
            <script>
                let counter = 0;
                $('#interview-worker_id option').each(function () {
                    counter++;
                    console.log(counter);
                    if (counter === 2) {
                        console.log($(this));
                        $(this).attr('selected', 'true');
                    }
                });
            </script>
        <?php endif; ?>


        <script>
            $('#interview-vacancy_id').on('change', function () {
                $.ajax({
                    url: '/worker/worker-vacancy/list',
                    type: 'post',
                    data: {
                        id: $(this).val(),
                    },
                    success: function (data) {
                        $('#interview-worker_id').empty();
                        $('#worker-view').attr("data-enabled", false);
                        $('#worker-view').addClass("text-gray");
                        if (data !== null) {
                            $('#interview-worker_id').removeAttr('disabled');
                            $('#selling-form-submit-button').removeAttr('disabled');
                            $('#alert-danger').hide();
                            $.each(data, function (value, key) {
                                $('#interview-worker_id').append($('<option></option>').attr("value", value).text(key));
                            });
                            $('#interview-worker_id').val('');

                        } else {
                            $('#interview-worker_id').attr('disabled', 'disabled');
                            $('#selling-form-submit-button').attr('disabled', 'disabled');
                            $('#alert-danger').show();

                            //   $('#worker-select').hide();
                        }
                    }
                })
            })
        </script>
    </div>
    <?php if ($model->date_create || $model->id): ?>
        <div class="row">
            <div class="col-md-12 form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'id' => 'selling-form-submit-button']) ?>
            </div>
        </div>
    <?php endif; ?>
    <?php ActiveForm::end(); ?>
</div>

<?php DetachedBlock::end(); ?>

<?php Pjax::end() ?>

<?php if (!$model->isNewRecord): ?>
<?php DetachedBlock::begin(['example' => 'История']); ?>
<div class="row">
    <div class="col-md-12 form-group">
        <?= Html::a('Начать разговор', Url::to('/hr/strategy/talk?id=' . $model->id), ['class' => 'btn btn-success', 'id' => 'selling-talk']) ?>
        <?= Html::Button('История', ['class' => 'btn btn-success', 'id' => 'openDialog']) ?>
    </div>
    <div class="hidden" id="dialog">

        <?php Pjax::begin(['enablePushState' => false]) ?>
        <?= !empty($model->dialog) ? $model->dialog : '' ?>
        <?= $form = Html::beginForm(['talk/comment-history'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>
        <?= Html::textarea('comment', '', ['rows' => 5]) ?>

        <?= Html::input('hidden', 'id', $model->id, ['rows' => 5]) ?>
        <?= Html::submitButton('Добавить') ?>
        <?= Html::endForm() ?>
        <?php Pjax::end() ?>
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
    <?php endif; ?>
