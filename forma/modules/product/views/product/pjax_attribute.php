<?php


use forma\modules\product\components\SystemWidget;
use forma\modules\product\records\FieldProductValue;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use forma\components\widgets\ModalCreate;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use forma\modules\product\records\Product;
use kartik\select2\Select2;
use forma\modules\product\records\PackUnit;
use forma\modules\core\widgets\DetachedBlock;
use forma\modules\product\records\Type;
use forma\modules\product\records\Manufacturer;
use yii\web\View;
use forma\modules\product\records\Category;
use kartik\color\ColorInput;
use forma\modules\product\records\Color;
use yii\widgets\Pjax;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
?>

<?php
Pjax::begin([
    'enablePushState' => false,
]);

if (!empty($fieldAttributes)) {
    foreach ($fieldAttributes as $key => $fieldAttribute) {
        echo SystemWidget::getByName($key, $fieldAttribute, 'yes');
        echo '</br>';
    }
}else{
    echo'В данной категории нет дополнительных характеристик';
}

Pjax::end();
?>


