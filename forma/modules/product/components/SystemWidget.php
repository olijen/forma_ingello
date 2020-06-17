<?php


namespace forma\modules\product\components;


use forma\components\widgets\ModalCreate;
use forma\modules\product\records\Category;
use forma\modules\product\records\Field;
use forma\modules\product\records\FieldProductValue;
use forma\modules\product\records\FieldValue;
use kartik\color\ColorInput;
use kartik\date\DatePicker;
use kartik\daterange\DateRangePicker;
use kartik\datetime\DateTimePicker;
use kartik\file\FileInput;
use kartik\number\NumberControl;
use kartik\range\RangeInput;
use kartik\rating\StarRating;
use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
use kartik\touchspin\TouchSpin;
use kartik\typeahead\Typeahead;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;


class SystemWidget
{
    public $fieldKey;
    public $field;
    public $productValue;

    public function widgetColorInput()
    {
        $this->productValue->value = $this->getDefaultValue();

        return ColorInput::widget([
            'model' => $this->productValue,
            'attribute' => $this->getAttribute(),
            'value' => $this->productValue->value,
        ]);
    }

    public function widgetDatePicker()
    {

        $this->productValue->value = $this->getDefaultValue();

        return DatePicker::widget([
            'model' => $this->productValue,
            'attribute' => $this->getAttribute(),
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            'value' => $this->productValue->value,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd.mm.yyyy'
            ]
        ]);
    }

    public function widgetTypeahead()
    {
        if (!isset($_GET['id']) && !empty($this->field->fieldValues) && !isset($_GET['ProductSearch'])) {
            $defaultValue = '';
            foreach ($this->field->fieldValues as $k => $value) {
                if ($value->is_main == 1) {
                    $defaultValue = $value->name;
                }
            }
            $this->productValue->value = $defaultValue;
        }

        $arrayHelperValues = ArrayHelper::map(\forma\modules\product\records\FieldValue::find()
            ->where(['field_id' => $this->field->id])
            ->all(), 'id', 'name');

        $arrayValues = [];
        foreach ($arrayHelperValues as $arrayValue) {
            $arrayValues [] = $arrayValue;
        }

        return Typeahead::widget([
            'model' => $this->productValue,
            'attribute' => $this->getAttribute(),
            'value' => $this->productValue->value,
            'options' => ['placeholder' => 'Filter as you type ...'],
            'pluginOptions' => ['highlight' => true],
            'dataset' => [
                [
                    'local' => $arrayValues, //Работает при индексах от 0 и до ......
                    'limit' => 15
                ]
            ]
        ]);
    }

    public function widgetDateTimePicker()
    {
        $this->productValue->value = $this->getDefaultValue();

        return DateTimePicker::widget([
            'model' => $this->productValue,
            'attribute' => $this->getAttribute(),
            'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
            'value' => $this->productValue->value,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd.mm.yyyy  hh:ii'
            ]
        ]);
    }

    public function widgetDateRangePicker()
    {
        $this->productValue->value = $this->getDefaultValue();

        return DateRangePicker::widget([
            'model' => $this->productValue,
            'attribute' => $this->getAttribute(),
            'convertFormat' => true,
            'value' => $this->productValue->value,
            'pluginOptions' => [
                'timePicker' => true,
                'timePickerIncrement' => 30,
                'locale' => [
                    'format' => 'y.m.d  H:i:s'
                ]
            ]
        ]);
    }

    public function widgetRangeInput()
    {
        $maxValue = $this->field->defaulted;

        return RangeInput::widget([
            'model' => $this->productValue,
            'attribute' => $this->getAttribute(),
            'value' => $this->productValue->value,
            'html5Container' => ['style' => 'width:250px'],
            'html5Options' => ['min' => 0, 'max' => $maxValue, 'step' => 1],
            'options' => ['placeholder' => ' '],
        ]);
    }

    public function widgetNumberControl()
    {
        $this->productValue->value = $this->getDefaultValue();

        return NumberControl::widget([
            'model' => $this->productValue,
            'attribute' => $this->getAttribute(),
            'value' => $this->productValue->value,
        ]);
    }

    public function widgetTouchSpin()
    {
        $this->productValue->value = $this->getDefaultValue();
//de( $this->productValue->value);
        return TouchSpin::widget([
            'model' => $this->productValue,
            'attribute' => $this->getAttribute(),
            'value' => $this->productValue->value,
            'options' => ['placeholder' => ' '],
            'pluginOptions' => [
                'buttonup_class' => 'btn btn-primary',
                'buttondown_class' => 'btn btn-info',
                'buttonup_txt' => '<i class="glyphicon glyphicon-plus-sign"></i>',
                'buttondown_txt' => '<i class="glyphicon glyphicon-minus-sign"></i>',
                'min' => 0,
                'max' => 1000000000000000000000000000000000000000000000,
            ]
        ]);
    }


    public function widgetStarRating()
    {
        $this->productValue->value = $this->getDefaultValue();

        return StarRating::widget([
            'model' => $this->productValue,
            'attribute' => $this->getAttribute(),
            'value' => $this->productValue->value,
            'pluginOptions' => ['size' => 'lg']
        ]);
    }

    public function widgetMultiSelect()
    {

        if (!empty($this->productValue->value) && is_string($this->productValue->value)) {

            $multiSelectValue = json_decode($this->productValue->value);
            $values = [];
            if (!is_array($multiSelectValue)) {
                $this->productValue->value = '';
            } elseif (is_array($multiSelectValue)) {
                foreach ($multiSelectValue as $k => $value) {
                    $values[] = $value;
                }
                $this->productValue->value = $values;
            }
        } else
            if (!isset($_GET['id']) && !empty($this->field->fieldValues) && !isset($_GET['ProductSearch'])) {
                $values = [];
                foreach ($this->field->fieldValues as $k => $value) {
                    if ($value->is_main === 1) {
                        $values[] = $value;
                    }
                }
                $this->productValue->value = $values;
            }

        return Select2::widget([
            'model' => $this->productValue,
            'attribute' => '[' . $this->productValue->field_id . '][' . $this->productValue->id . '][multiSelect]value',
            'value' => $this->productValue->value,
            'data' => ArrayHelper::map(\forma\modules\product\records\FieldValue::find()
                ->where(['field_id' => $this->field->id])
                ->all(), 'id', 'name'),
            'options' => [
                'placeholder' => ' ',
                'multiple' => true,
            ],
            'pluginOptions' => [
                'tags' => true,
            ],
        ]);
    }

    public function widgetSwitchInput()
    {
        $this->productValue->value = $this->getDefaultValue();

        return SwitchInput::widget([
            'model' => $this->productValue,
            'attribute' => $this->getAttribute(),
            'value' => $this->productValue->value,
//            'disabled' => true
        ]);
    }


    public function widgetDropDownList()
    {
        if (!isset($_GET['id']) && !empty($this->field->fieldValues) && !isset($_GET['ProductSearch'])) {
            foreach ($this->field->fieldValues as $k => $value) {
                if ($value->is_main == 1) {
                    $defaultValue = $value;
                }
            }
            $this->productValue->value = $defaultValue;
        }

        return Html::activeDropDownList($this->productValue,
            $this->getAttribute(),
            ArrayHelper::map(\forma\modules\product\records\FieldValue::find()
                ->where(['field_id' => $this->field->id])
                ->all(), 'id', 'name'),
            ['class' => 'form-control', 'prompt' => ' ',
                'options' => ['value' => $this->productValue->value,]]);
    }

    public function widgetTextInput()
    {
        $this->productValue->value = $this->getDefaultValue();

        return Html::activeInput('text', $this->productValue,
            $this->getAttribute(),
            ['class' => 'form-control', 'options' => ['value' => $this->productValue->value]]);
    }

    public function getDefaultValue()
    {
        if (!isset($_GET['id']) && !empty($this->field->defaulted) && !isset($_GET['ProductSearch'])) {
            return $this->productValue->value = $this->field->defaulted;
        }
        return $this->productValue->value;
    }

    public function getAttribute()
    {
        return '[' . $this->productValue->field_id . '][' . $this->productValue->id . ']value';
    }

    public function getDefaultValuesMultiSelect()
    {
        foreach ($this->field->fieldValues as $k => $value) {
            if ($value->is_main == 1) {
                $defaultValue = $value;
            }
        }
        return $defaultValue;
    }

    public function getLabel()
    {
        echo Html::label($this->field->name, 'username', ['class' => 'control-label']);
    }

    public static function setWidgetValueNames($widgetNames)
    {
        ArrayHelper::setValue($widgetNames, 'widgetColorInput', 'Цвет');
        ArrayHelper::setValue($widgetNames, 'widgetDropDownList', 'Выпадающий список');
        ArrayHelper::setValue($widgetNames, 'widgetDatePicker', 'Дата');
        ArrayHelper::setValue($widgetNames, 'widgetMultiSelect', 'Мультиселект');
        ArrayHelper::setValue($widgetNames, 'widgetTextInput', 'Поле ввода');
        ArrayHelper::setValue($widgetNames, 'widgetDateTimePicker', 'Дата и время');
        ArrayHelper::setValue($widgetNames, 'widgetDateRangePicker', 'Промежуток времени');
        ArrayHelper::setValue($widgetNames, 'widgetStarRating', 'Рейтинг');
        ArrayHelper::setValue($widgetNames, 'widgetTypeahead', 'Автодополнение');
        ArrayHelper::setValue($widgetNames, 'widgetSwitchInput', 'Переключатель');
        ArrayHelper::setValue($widgetNames, 'widgetTouchSpin', 'Каунтер');
        ArrayHelper::setValue($widgetNames, 'widgetNumberControl', 'Число');
        ArrayHelper::setValue($widgetNames, 'widgetRangeInput', 'Диапазон');
        return $widgetNames;
    }

    public static function getFunctionNames()
    {
        $getWidgetName = get_class_methods(new SystemWidget());
        $widgetNames = [];
        foreach ($getWidgetName as $widgetName) {
            if (strstr($widgetName, 'widget')) {
                $widgetNames[$widgetName] = $widgetName;
            }
        }

        $widgetNames = self::setWidgetValueNames($widgetNames);

        return $widgetNames;
    }

    public static function gridFilter($key, Field $field, $getLabel, $arrayValue = null)
    {

        $widgetCall = new SystemWidget;
        $widgetCall->field = $field;
        $widgetCall->fieldKey = $key;

        $widgetCall->productValue = new FieldProductValue();
        $widgetCall->productValue->id = 'null';
        $widgetCall->productValue->field_id = $field->id;
        $widgetCall->productValue->value = '';

        if (isset($arrayValue)) {
            if (isset($arrayValue['multiSelect']["value"]) && !empty($arrayValue['multiSelect']["value"])) {
                $widgetCall->productValue->value = $arrayValue['multiSelect']["value"];

            } elseif (isset($arrayValue["value"]) && !empty($arrayValue["value"])) {
                $widgetCall->productValue->value = $arrayValue['value'];

            }

        }

        $functionName = $field->widget;

        return $widgetCall->$functionName();


    }

    public static function getByName($key, Field $field, $getLabel)
    {
        $widgetCall = new SystemWidget;
        $widgetCall->field = $field;
        $widgetCall->fieldKey = $key;


        if (isset($_GET['id']) && !empty($productValue = $field->getValuesForProduct($_GET['id']))) {// TODO
            $widgetCall->productValue = $field->getValuesForProduct($_GET['id']);
        } else {
            $widgetCall->productValue = new FieldProductValue();
            $widgetCall->productValue->id = 'null';
            $widgetCall->productValue->field_id = $field->id;
            $widgetCall->productValue->value = '';
        }
        $functionName = $field->widget;
        if ($getLabel === true) {
            $widgetCall->getLabel();
        }
        return $widgetCall->$functionName();

    }

}