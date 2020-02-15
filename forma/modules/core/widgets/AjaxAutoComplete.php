<?php

namespace forma\modules\core\widgets;

use yii\jui\AutoComplete as YiiAutoComplete;
use yii\helpers\Html;

class AjaxAutoComplete extends YiiAutoComplete
{
    public $inputId = '';
    public $url = '';
    public $options = [];
    public $hiddenAttr = '';

    protected $_cssOptions = ['class' => 'form-control'];

    public function init()
    {
        parent::init();

        $this->_cssOptions = array_merge($this->_cssOptions, $this->options);
        $this->inputId = Html::getInputId($this->model, $this->attribute);
    }

    public function run()
    {
        $this->getView()->registerJs("
            jQuery('#{$this->inputId}').autocomplete({
                minLength: 1,
                source: function(request, response) {
                    $.getJSON('{$this->url}', request, function(data, status, xhr) {
                        response(data);
                    });
                },
                select: function(event, ui) {
                    console.log(ui);
                },
            });
        ");

        return Html::activeHiddenInput($this->model, $this->hiddenAttr, []) .
            Html::activeTextInput($this->model, $this->attribute, $this->_cssOptions);
    }
}
