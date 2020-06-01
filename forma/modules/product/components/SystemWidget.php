<?php


namespace forma\modules\product\components;


use forma\components\widgets\ModalCreate;
use forma\modules\product\records\Category;
use forma\modules\product\records\Field;
use forma\modules\product\records\FieldProductValue;
use forma\modules\product\records\FieldValue;
use kartik\color\ColorInput;
use kartik\date\DatePicker;
use kartik\select2\Select2;
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
//        if (!isset($_GET['id']) && !empty($this->field->defaulted) && !isset($_GET['ProductSearch'])) {
//            $this->productValue->value = $this->field->defaulted;
//        }
        $this->productValue->value = $this->getDefaultValue();

        return ColorInput::widget([
            'model' => $this->productValue,
            'attribute' => $this->getAttribute(),
            'value' => $this->productValue->value,
        ]);
    }

    public function widgetDatePicker()
    {
        //        if (!isset($_GET['id']) && !empty($this->field->defaulted) && !isset($_GET['ProductSearch'])) {
//            $this->productValue->value = $this->field->defaulted;
//        }
        $this->productValue->value = $this->getDefaultValue();

        return DatePicker::widget([
//            'name' => 'FieldProductValue[' . $this->productValue->id . '][value]',
            'model' => $this->productValue,
            'attribute' => $this->getAttribute(),
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            'value' => $this->productValue->value,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]);
    }

    public function widgetMultiSelect()
    {
        if (!empty($this->productValue->value)) {
            $multiSelectValue = json_decode($this->productValue->value);
            $key = [];
            if (!is_array($multiSelectValue)){
                $this->productValue->value = '';
            }elseif (is_array($multiSelectValue)){
                foreach ($multiSelectValue as $k => $value) {
                    $key[] = $value;

                }
                $this->productValue->value = $key;
            }


        } elseif (!isset($_GET['id']) && !empty($this->field->fieldValues) && !isset($_GET['ProductSearch'])) {
            foreach ($this->field->fieldValues as $k => $value) {
                if ($value->is_main == 1) {
                    $key[] = $value;
                }
            }
            $this->productValue->value = $key;
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

    public function getDefaultValues()
    {
        foreach ($this->field->fieldValues as $k => $value) {
            if ($value->is_main == 1) {
                $defaultValue = $value;
            }
        }
        return $defaultValue;
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
        //        if (!isset($_GET['id']) && !empty($this->field->defaulted) && !isset($_GET['ProductSearch'])) {
//            $this->productValue->value = $this->field->defaulted;
//        }
        $this->productValue->value = $this->getDefaultValue();

        return Html::activeInput('text', $this->productValue,
            $this->getAttribute(),
            ['class' => 'form-control', 'options' => ['value' => $this->productValue->value]]);
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

    public static function getByName($key, Field $attribute, $getLabel = null)
    {

        $widgetCall = new SystemWidget;
        $widgetCall->field = $attribute;
        $widgetCall->fieldKey = $key;


        if (isset($_GET['id']) && !empty($productValue = $attribute->getValuesForProduct($_GET['id']))) {
//        if (isset($_GET['id']) && !empty($widgetCall->productValue->id)) {

            $widgetCall->productValue = $attribute->getValuesForProduct($_GET['id']);
//            de('dwa');
        } else {
//            de('dwa1edsadw');
            $widgetCall->productValue = new FieldProductValue();
//            de( $widgetCall->productValue->attributes);
            $widgetCall->productValue->id = 'null'; // TODO переделать тут и в контроллере
            $widgetCall->productValue->field_id = $attribute->id;
            $widgetCall->productValue->value = '';
        }
        $functionName = $attribute->widget;
        if ($getLabel == 'yes') {
            $widgetCall->getLabel();
        }
        return $widgetCall->$functionName();

    }

}