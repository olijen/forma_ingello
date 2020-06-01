<?php

use forma\modules\product\components\SystemWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;


?>


<?php
if ($model->widget == 'widgetDropDownList' || $model->widget == 'widgetMultiSelect') {
    $i = 0;

    foreach ($model->fieldValues as $fieldValue) {
        $i++;
        echo Html::label('Значение ' . $i, 'name ', ['class' => 'control-label']);
        echo Html::activeInput('text', $fieldValue,
            '[' . $fieldValue->id . ']name', ['class' => 'form-control']);
        echo Html::activeCheckbox($fieldValue, '[' . $fieldValue->id . ']is_main', ['label' => false,]);
        echo '</br>';
        echo Html::activeHiddenInput($fieldValue,
            '[' . $fieldValue->id . ']field_id', ['class' => 'form-control']);

    }
    echo $this->render('field_values', [
        'i' => $i,
    ]);
} else {

    echo Html::label('Значение по умолчанию', 'defaulted ', ['class' => 'control-label']);
    echo Html::activeInput('text', $model,
        'defaulted', ['class' => 'form-control']);
}


