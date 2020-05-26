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
        $this->getLabel();
        return ColorInput::widget([
            'model' => new FieldProductValue,
            'attribute' => '[' . $this->productValue->id . ']value',
            'value' => $this->productValue->value,

        ]);
    }

    public function widgetDatePicker()
    {
        $this->getLabel();
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
        $key = [];

        if (!empty($this->productValue->value)) {
            $multiSelectValue = json_decode($this->productValue->value);
            de($this->productValue->value);
            foreach ($multiSelectValue as $k => $v) {
                $key[] = $k;
                de($key);
            }
        }
//        de($key);

        $this->getLabel();
//          Select2::widget([
////            'model' => new FieldProductValue(),
//            'name' => 'dwasfwq',
//            'value' => $key, // value to initialize
//            'data' => ArrayHelper::map(\forma\modules\product\records\FieldValue::find()
//                ->where(['field_id' => $this->attribute->id])
////                ->andWhere()
//                ->all(), 'id', 'name'),
//            'options' => [
//                'placeholder' => 'Можно добавить новые или выбрать из списка ...',
//                'multiple' => true,
//            ],
//        ]);


        return Select2::widget([
//            'name' => 'group_id[location_id]',
////            'model' => new FieldProductValue(),
////            'attribute' => '[' . $this->productValue->id . ']value',
//            'value' => [10, 11],     // TODO узнать почему не подставляются значения

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
//        $form->field($model, 'cat')->dropDownList($items, $param);
//        $form->field($model, 'parent_id')->dropDownList(
//            \forma\modules\product\records\Category::getList(),
//            ['prompt' => '']
//        )
//        echo Html::dropDownList('cat', 'null', $items, $param);
//        de($this->attribute->id);
        $this->getLabel();
        var_dump($this->attribute->id);
        return Html::dropDownList('FieldProductValue[' . $this->productValue->id . '][value]', 'null',
            ArrayHelper::map(\forma\modules\product\records\FieldValue::find()
                ->where(['field_id' => $this->attribute->id])
//                ->andWhere()
                ->all(), 'name', 'name'), ['class' => 'form-control']);
    }

    public function widgetTextInput()
    {
        $this->getLabel();
        return Html::activeInput('text', $this->productValue, '[' . $this->productValue->id . ']value', ['class' => 'form-control']);

    }

    public function getLabel()
    {
        echo Html::label($this->attribute->name, 'username', ['class' => 'control-label']);
    }

    public static function getFunctionNames()
    {
        $getWidgetName = get_class_methods(new SystemWidget());
        $widgetNames = [];
        foreach ($getWidgetName as $widgetName) {
            if (stristr($widgetName, 'widget')) {

                $widgetNames[$widgetName] = $widgetName;
//                de($widgetName);
            }
        }
        return $widgetNames;
    }

    public static function getByName($key, Field $attribute)
    {
        $widgetCall = new SystemWidget;
        $widgetCall->attribute = $attribute;
//        de($attribute);
        $widgetCall->attributeKey = $key;

        if (isset($_GET['id'])) {

//            if ($attribute->id == 8) {
//                de('dwad11111s');
            $widgetCall->productValue = $attribute->getValuesForProduct($_GET['id']);
//            de($attribute->getValuesForProduct($_GET['id']));
//            de( $widgetCall->productValue);
//            }

//            de($widgetCall->productValue);
//                if (empty($widgetCall->productValue)) {
////                    de('dwaewadds');
//                    $widgetCall->productValue = new FieldProductValue();
//                    $widgetCall->productValue->id = $attribute->id;
//                    $widgetCall->productValue->value = ' ';
//                $saveProductValue = $widgetCall->productValue = new FieldProductValue();
//
//                $fieldProductValueId = $widgetCall->attribute->id;
////                de($fieldProductValueId);
//
//                $saveProductValue->product_id = $_GET['id'];
//
////                $saveProductValue->value = $fieldValueModel['value'];
//                $saveProductValue->field_id = $fieldProductValueId;
//                if (!$saveProductValue->validate()) {
//                    $error = $saveProductValue->errors;
//                    de('$error');
//                }
//                $saveProductValue->save();
////                de('daw');
//                }

        } else {

            $widgetCall->productValue = new FieldProductValue();
            $widgetCall->productValue->id = $attribute->id; // TODO переделать тут и в контроллере
            $widgetCall->productValue->value = '';

        }
        $functionName = $attribute->widget;
//        de($widgetCall->productValue);
//de($attribute);
//        de($widgetCall->productValue);
        return $widgetCall->$functionName();

    }

}