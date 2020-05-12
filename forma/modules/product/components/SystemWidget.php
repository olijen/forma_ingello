<?php


namespace forma\modules\product\components;


use forma\components\widgets\ModalCreate;
use forma\modules\product\records\Category;
use forma\modules\product\records\FieldProductValue;
use kartik\color\ColorInput;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;


class SystemWidget
{

    public $attributeKey;
    public $attribute;
//    public  $attributeName = null;
//    public  $attributeName = null;


    public function datePicker()
    {

        echo DatePicker::widget([
            'name' => 'FieldProductValue[' . $this->attributeKey . '][value]',
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            'value' => '23-Feb-1982',
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]);
    }

    public function multiSelect()
    {
        Select2::widget([
            'model' => new Category,
            'attribute' => 'id',
            'data' => Category::getList(),
            'options' => ['placeholder' => 'Select a state ...',],
        ]);

    }

    public function myColorInput()
    {
//        $this->dropDownList();
//        exit;


        echo ColorInput::widget([
            'model' => new FieldProductValue,
            'attribute' => '[' . $this->attributeKey . ']value',

        ]);
//        de($this->attributeKey);
//        'attribute' => '[' . $this->attributeKey . '][value]',

    }

    public function textInput()
    {

        echo Html::tag('input', ['class' => 'username', 'name' => 'sawrasd',]);

    }

    public function dropDownList()
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
        echo Html::dropDownList('FieldProductValue[' . $this->attributeKey . '][value]', 'null',
            ArrayHelper::map(\forma\modules\product\records\FieldValue::find()
                ->where(['field_id' => $this->attribute->id])
//                ->andWhere()
                ->all(), 'name', 'name'), ['class' => 'form-control']);
    }

    public function getLabel()
    {
        echo Html::label($this->attribute->name, 'username', ['class' => 'control-label']);
    }

    public static function getByName($key, $attribute)
    {
//        var_dump($key);

        $widgetCall = new SystemWidget;
        $widgetCall->attribute = $attribute;
        $widgetCall->attributeKey = $key;

        de($attribute->fieldProductValues);
        $functionName = $attribute->widget;
//        de($functionName);
//        de('$functionName');
//        de($functionName);
//        de($widgetCall->attribute->field);
//        de($widgetCall->attribute);
//        de();
//        $widgetCall->test();
//        $widgetCall->multiSelect();

        $widgetCall->$functionName();
    }

}