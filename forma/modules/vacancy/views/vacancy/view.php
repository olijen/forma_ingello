<?php

use forma\modules\core\widgets\DetachedBlock;
use kartik\tabs\TabsX;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model forma\modules\vacancy\records\Vacancy */
/* @var $interviewStateWorkerItems \forma\modules\hr\records\interviewstate\InterviewState */

$this->title = $model->name;
$this->params['homeLink'] = ['label' => 'Панель упраления', 'url' => '/hr', 'title' => 'Панель управления модулем найма'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Вакансии'), 'url' => ['index']];

\yii\web\YiiAsset::register($this);
?>
<div class="vacancy-view">
    <p>
        <?= Html::a(Yii::t('app', 'Редактировать'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы уверены что хотите удалить запись?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'rate',
            [
                'attribute' => 'description',
                'format' => 'html',
                'value' => function($data){
                    return $data->description;
                }
            ],
        ],
    ]) ?>
    <?php DetachedBlock::begin(['example' => 'История вакансии']); ?>
    <?php \yii\widgets\Pjax::begin(); ?>
        <?php $form = ActiveForm::begin(['action' => \yii\helpers\Url::to(['/vacancy/vacancy/view?id=' . $model->id])])?>
            <?php if (!empty($projects)):?>
                    <?= $form->field($model, 'projectId', ['options' => ['style' => 'width:25%']])
                    ->dropDownList(ArrayHelper::map($projects, 'id', 'name'))
                    ->label('Проект')?>
                    <?= Html::submitButton('Проверить', ['class' => 'btn btn-primary'])?>
                    <?php if (Yii::$app->request->post('Vacancy')):?>
                        <?php if (!empty($interviewStateWorkerItems)): ?>
                            <div style="margin-top: 40px">
                            <?=
                                TabsX::widget(['items' => $interviewStateWorkerItems, 'position'=>TabsX::POS_LEFT , 'encodeLabels' => false]);
                            ?>
                            </div>
                            <?php elseif (empty($interviewStateWorkerItems)): ?>
                                <p>По данному проекту еще нет истории</p>
                            <?php endif;?>
                    <?php endif;?>
            <?php else: ?>
                    <p>По данной вакансии еще нет истории</p>
                    <?= Html::a('Добавить вакансию на проект', ['/project/project-vacancy/create', 'vacancy_id' => $model->id], ['class' => 'btn btn-primary']);?>
            <?php endif; ?>
        <?php ActiveForm::end()?>
    <?php \yii\widgets\Pjax::end();?>
    <?php DetachedBlock::end();?>
</div>
