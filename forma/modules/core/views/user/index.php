<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel forma\modules\core\records\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model \forma\modules\core\records\User */
$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = ['label' => 'Рефералы', 'url' => '/core/default/people'];

?>
<div class="user-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать дочерний аккаунт', ['/core/site/signup-referer'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'password',
            'email:email',
            //'auth_key',
            // 'access_token',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete} {back} {login} ',
                'buttons' => [
                    'login' => function ($url,$model) {
                        if (Yii::$app->user->id == 1){
                        return Html::a('<span class="glyphicon glyphicon-user"></span>', ["impersonate?id=" . $model->id], ["title" => "login"]);
                    }
                        },
                    'back' => function ($url,$model) {
                        if (Yii::$app->request->cookies->getValue('Admin') ){
                        return Html::a('<span class="glyphicon glyphicon-user"></span>', ["unimpersonate"], ["title" => "назад"]);
                    }
                        },
                    ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
