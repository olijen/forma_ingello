<?php

use forma\modules\product\records\FieldValue;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model forma\modules\product\records\Category */

$this->title = 'Изменить категорию: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Объекты', 'url' => '/product'];
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="category-update">

    <?= $this->render('_form', [
        'model' => $model,
        'field' => $field,
        'searchParentField' => $searchParentField,
        'parentFieldDataProvider' => $parentFieldDataProvider,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,

    ]) ?>

</div>
