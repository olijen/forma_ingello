<?php

namespace forma\modules\core\widgets;

use kartik\select2\Select2;
use yii\web\JsExpression;

class AutoComplete extends Select2
{
    public $placeholder = 'Выберите товар для следующей позиции';
    public $url;
    public $checkQty = '1';

    public $dataRelation = 'product';
    public $titleAttr = 'name';

    protected $_selectCssClass = 'autocomplete-select';

    public function init()
    {
        parent::init();

        AutoCompleteAsset::register($this->getView());

        $this->options = array_merge($this->options, [
            'placeholder' => $this->placeholder,
            'class' => $this->_selectCssClass,
            'data-check-qty' => $this->checkQty,
        ]);

        $this->pluginOptions = array_merge($this->pluginOptions, [
            'allowClear' => true,
            'minimumInputLength' => 1,
            'ajax' => [
                'url' => $this->url,
                'dataType' => 'json',
                'data' => new JsExpression("function(params) {return {q:params.term};}"),
                'processResults' => new JsExpression("function(data, params) {return data;}"),
                'cache' => false,
            ],
        ]);

        if ($this->model->hasErrors() && $this->value) {
            $this->data = [
                $this->value => $this->model->{$this->dataRelation}->{$this->titleAttr},
            ];
        }
    }
}
