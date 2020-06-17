<?php

use forma\modules\product\components\SystemWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

?>

<?php
if ($model->widget == 'widgetDropDownList' || $model->widget == 'widgetMultiSelect' ||  $model->widget == 'widgetTypeahead') {
    $fieldItem = 0;

    foreach ($model->fieldValues as $fieldValue) {
        $fieldItem++;
        echo Html::label('Значение ' . $fieldItem, 'name ', ['class' => 'control-label']);
        echo Html::activeInput('text', $fieldValue,
            '[' . $fieldValue->id . ']name', ['class' => 'form-control']);
        if ($model->widget == 'widgetMultiSelect'  ||  $model->widget == 'widgetTypeahead') {
            echo Html::activeCheckbox($fieldValue, '[' . $fieldValue->id . ']is_main', ['label' => false,]);
        } elseif($model->widget == 'widgetDropDownList') {
            echo '<input id="field-value-is_main" type="radio" class=\'checkeddd\' name="FieldValueRadioButton" value='.$fieldValue->id.'>';
        }
        echo '</br>';

        echo Html::activeHiddenInput($fieldValue,
            '[' . $fieldValue->id . ']field_id', ['class' => 'form-control']);
    }
    echo $this->render('field_values', [
        'nameWidgetField' => $model->widget,
        'fieldItem' => $fieldItem,
    ]);
} else {

    echo Html::label('Значение по умолчанию', 'defaulted ', ['class' => 'control-label']);
    echo Html::activeInput('text', $model,
        'defaulted', ['class' => 'form-control']);
}


