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
    public $attributeKey;
    public $attribute;
    public $productValue;

    public function widgetColorInput()
    {
//        $this->getLabel();
        return ColorInput::widget([
            'model' => $this->productValue,
            'attribute' => '[' . $this->productValue->id . ']value',
            'value' => $this->productValue->value,
        ]);
    }

    public function widgetDatePicker()
    {
//        $this->getLabel();
        return DatePicker::widget([
            'name' => 'FieldProductValue[' . $this->productValue->id . '][value]',
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
//        $this->getLabel();
        if (!empty($this->productValue->value)) {
            $multiSelectValue = json_decode($this->productValue->value);
//                de($multiSelectValue);
            $key = [];
            foreach ($multiSelectValue as $k => $v) {
                $key[] = $v;
            }
            $this->productValue->value = $key;
        }

        return Select2::widget([
            'model' => $this->productValue,
            'attribute' => '[' . $this->productValue->id . '][multiSelect]value',
            'value' => $this->productValue->value,
            'data' => ArrayHelper::map(\forma\modules\product\records\FieldValue::find()
                ->where(['field_id' => $this->attribute->id])
                ->all(), 'id', 'name'),
            'options' => [
                'placeholder' => 'Можно добавить новые или выбрать из списка ...',
                'multiple' => true,
            ],
            'pluginOptions' => [
                'tags' => true,
            ],
        ]);
    }


    public function widgetDropDownList()
    {
//        $this->getLabel();
        var_dump($this->attribute->id);
        return Html::dropDownList('FieldProductValue[' . $this->productValue->id . '][value]', 'null',
            ArrayHelper::map(\forma\modules\product\records\FieldValue::find()
                ->where(['field_id' => $this->attribute->id])
                ->all(), 'name', 'name'), ['class' => 'form-control']);
    }

    public function widgetTextInput()
    {
//        $this->getLabel();
        return Html::activeInput('text', $this->productValue, '[' . $this->productValue->id . ']value', ['class' => 'form-control']);
    }

    public function getLabel()
    {
        echo Html::label($this->attribute->name, 'username', ['class' => 'control-label']);
    }

    public static function setWidgetValueNames($widgetNames)
    {
        ArrayHelper::setValue($widgetNames, 'widgetColorInput', 'Цвет');
        ArrayHelper::setValue($widgetNames, 'widgetDatePicker', 'Дата');
        ArrayHelper::setValue($widgetNames, 'widgetMultiSelect', 'Мультиселект');
        ArrayHelper::setValue($widgetNames, 'widgetDropDownList', 'Выпадающий список');
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
        $widgetCall->attribute = $attribute;
        $widgetCall->attributeKey = $key;

        if (isset($_GET['id'])) {
            $widgetCall->productValue = $attribute->getValuesForProduct($_GET['id']);
        } else {
            $widgetCall->productValue = new FieldProductValue();
            $widgetCall->productValue->id = $attribute->id; // TODO переделать тут и в контроллере
            $widgetCall->productValue->value = '';
        }
        $functionName = $attribute->widget;
        if ($getLabel == 'yes') {
            $widgetCall->getLabel();
        }
        return $widgetCall->$functionName();

    }

}