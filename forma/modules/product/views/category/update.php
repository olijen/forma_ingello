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

    <?php

    $renderVar = [
        'model' => $model,
        'field' => $field,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'possibleCategories' => $possibleCategories,
        'allFieldValue' => $allFieldValue,
        'fieldValuesNameFilterArray' => $fieldValuesNameFilterArray,
    ];
    if (isset($searchParentField) && isset($parentFieldDataProvider)) {
        $renderVar = array_merge($renderVar,
            ['searchParentField' => $searchParentField, 'parentFieldDataProvider' => $parentFieldDataProvider,
                'parentFieldValuesNameFilterArray' => $parentFieldValuesNameFilterArray,]);
    }

    echo $this->render('_form', $renderVar);

    ?>


</div>
