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
//if (isset($_GET['id'])){
//    $productValues = \forma\modules\product\records\Field::getValuesForProduct($_GET['id']);
//}

//echo Html::activeInput('text', $fieldAttributes[0], 'name' );
//echo Html::tag('input', ['class' => 'username', 'name' => 'sawrasd',]);


if (!empty($fieldAttributes)) {
    foreach ($fieldAttributes as $key => $fieldAttribute) {
//
//        $productValue = $prod uctValues[$i++];
        echo SystemWidget::getByName($key, $fieldAttribute);
        echo '</br>';

    }
}

Pjax::end();
?>


