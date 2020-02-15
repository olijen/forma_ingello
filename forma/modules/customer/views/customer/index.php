<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\customer\records\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = ['label' => 'Люди', 'url' => '/core/default/people'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать клиента', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::button('Подготовить рассылку', ['id' => 'preSend', 'class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(['enablePushState' => false]); ?>
    <?= Html::beginForm(['customer/send'], 'post', ['data-pjax' => ''])?>
    <div class="row hidden" id="mail-form">
        <div class="container-fluid">
            <div class="col-lg-6">
                <div class="col-md-12" style="padding-bottom: 12px">
                    <?= Html::label('Тема сообщения') ?>
                    <?= Html::input('text', 'messageSubject', '', ['class' => 'form-control']) ?>
                </div>
                <div class="col-md-12" style="padding-bottom: 12px">
                    <?= Html::label('Сообщение') ?>
                    <?= Html::textarea('message', '', ['class' => 'form-control',  'style' => 'height: 100px']) ?>
                </div>

                <div class="col-md-12" style="padding-bottom: 12px">
                    <?= Html::submitButton('Начать рассылку', ['class' => 'btn btn-success', 'submitButton']) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6"></div>
    </div>
    <div class="row">
        <?php if(Yii::$app->session->hasFlash('SentMessage')): ?>
            <div class="alert alert-success" role="alert">
                <?= Yii::$app->session->getFlash('SentMessage', '', 'Success') ?>
            </div>
        <?php endif; ?>
    </div>
    <?= $grid = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => ['name' => 'checkbox[]']
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{history} {update} {delete}',
                'buttons' => [
                    'history' => function ($url, $model, $key) {
                        return "<a href=\"/selling/main?SellingSearch[customer_id]={$model->id}\" title=\"История\" aria-label=\"История\" data-pjax=\"0\"><span class=\"glyphicon glyphicon-list-alt\"></span></a>";
                    }
                ]
            ],

            'firm',
            'name',
            'chief_phone',
            'address',
            [
                'label'=>'Приоритет',
                'format'=>'text', // Возможные варианты: raw, html
                'content'=>function($data){
                      $count = 0;
                      foreach ($data->getSellings()->all() as $value) {
                          $count = $count + $value->state;
                      }

                      return $count;
                },
            ],

            // 'email:email',
            // 'tax_rate',
        ],
    ]); ?>


    <?= Html::endForm()?>
<?php Pjax::end(); ?></div>
<script>
    var flag = false;
    document.getElementById('preSend').onclick = function () {
        if (flag === false) {
            document.getElementById('mail-form').classList.remove('hidden');
            document.getElementById('preSend').innerText = 'Окончить рассылку';
            flag = true;
        } else {
            document.getElementById('mail-form').classList.add('hidden');
            document.getElementById('preSend').innerText = 'Подготовить рассылку';
            flag = false;
        }
    }
</script>
