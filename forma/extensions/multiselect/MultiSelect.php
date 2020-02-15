<?php

namespace multiselect\multiselect;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\widgets\InputWidget;

class MultiSelect extends InputWidget
{
    /**
     * @var bool
     */
    public $enableResetButton = false;

    /**
     * @var array data for generating the list options (value=>display)
     */
    public $data = [];

    /**
     * @var array the options for the Bootstrap Multiselect JS plugin.
     * Please refer to the Bootstrap Multiselect plugin Web page for possible options.
     * @see http://davidstutz.github.io/bootstrap-multiselect/#options
     */
    public $clientOptions = [];

    public $containerOptions = [];

    public $resetButtonOptions = [];

    /**
     * Initializes the widget.
     */
    public function init()
    {
        if (empty($this->data)) {
            throw new  InvalidConfigException('"Multiselect::$data" attribute cannot be blank or an empty array.');
        }
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerPlugin();

        if ($this->enableResetButton) {
            Html::addCssClass($this->containerOptions, 'btn-group');
        }

        $html = Html::beginTag('div', $this->containerOptions);

        if ($this->hasModel()) {
            $html .= Html::activeDropDownList($this->model, $this->attribute, $this->data, $this->options);
        } else {
            $html .= Html::dropDownList($this->name, $this->value, $this->data, $this->options);
        }

        if ($this->enableResetButton) {
            $html .= $this->resetButton();
        }

        $html .= Html::endTag('div');

        return $html;
    }

    /**
     * Registers MultiSelect Bootstrap plugin and the related events
     */
    protected function registerPlugin()
    {
        $view = $this->getView();

        MultiSelectAsset::register($view);

        if (isset($this->clientOptions['enableCollapsibleOptGroups']) && $this->clientOptions['enableCollapsibleOptGroups']) {
            MultiSelectCollapsibleOptGroupsAsset::register($view);
        }

        $id = $this->options['id'];

        $options = $this->clientOptions ? Json::encode($this->clientOptions) : '';

        $js = "jQuery('#$id').multiselect($options);";
        $view->registerJs($js);
    }

    protected function resetButton()
    {
        $defaultOptions = [
            'id' => $this->id . '_reset',
            'class' => 'btn btn-default',
            'onclick' => new JsExpression("$('#{$this->id}').multiselect('clearSelection'); $('#{$this->id}').multiselect('select', " . json_encode($this->value) . ");"),
        ];

        $options = ArrayHelper::merge($defaultOptions, $this->resetButtonOptions);

        $content = ArrayHelper::remove($options, 'content', Html::tag('span', null, ['class' => 'glyphicon glyphicon-refresh', 'aria-hidden' => true]));
        $tag = ArrayHelper::remove($options, 'tag', 'span');

        return Html::tag($tag, $content, $options);
    }
}

