<?php

use yii\grid\GridView;
use yii\helpers\Html;
use forma\extensions\kartik\DynaGrid;
use yii\bootstrap\ButtonDropdown;

/* @var $this yii\web\View */
/* @var $searchModel forma\modules\customer\records\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = ['label' => 'Люди', 'url' => '/core/default/people'];
?>
<div class="customer-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fas fa-user-plus"></i> Создать клиента', ['create'], ['class' => 'btn btn-success forma_green']) ?>
        <?= Html::button('<i class="fas fa-envelope-open-text"></i> Подготовить рассылку', ['id' => 'preSend', 'class' => 'btn btn-success forma_green']) ?>
    </p>



<?php /*Pjax::begin(['enablePushState' => false]); */?>
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
            'telegram',
            'skype',
            'whatsapp',
            'viber',
            'address',
            [
                'label'=>'Приоритет',
                'format'=>'text', // Возможные варианты: raw, html
                'content'=>function($data){
                      $count = $data->getSellings()->count();
                      return $count;
                },
            ],
            [
                'attribute' => 'customer_source_id',
                'value' => 'customerSource.name',
                //'filter' => ActiveRecordHelper::getList(CustomerSource::class),

            ],

            // 'email:email',
            // 'tax_rate',
        ],
    ]); ?>

    <?= Html::endForm()?>

<?php /*Pjax::end(); */?>

</div>
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
