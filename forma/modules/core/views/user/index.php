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
        <?= Html::a('Создать дочерний аккаунт', ['/core/site/signup-referer'], ['class' => 'btn btn-success btn-all-screen']) ?>
    </p>
<?php Pjax::begin(); ?>
    <?php $id = Yii::$app->user->id; ?>
    <?= GridView::widget([
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
                'template' => '{update} {delete}  {login} ',
                'buttons' => [
                    'login' => function ($url,$model) {
                        return Html::a('<span class="glyphicon glyphicon-user"></span>', ["impersonate?id=" . $model->id], ["title" => "login"]);
                        },
                    ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
