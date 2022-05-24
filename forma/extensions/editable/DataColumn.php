<?php

namespace forma\extensions\editable;

use ekaragodin\bootstrap\Slider;
use Yii;
use yii\grid\DataColumn as YiiDataColumn;
use Closure;
use yii\helpers\Html;
use yii\web\View;

class DataColumn extends YiiDataColumn
{
    const INPUT_TEXT_AREA = 'textArea';
    const INPUT_SELECT = 'select';

    const TD_CSS_CLASS = 'editable-cell';
    const IGNORE_EXPORT_CSS_CLASS = 'skip-export';

    public $label = null;

    public $isEditable = true;
    public $reloadPjax = false;
    public $pjaxContainer = '';

    public $inputType = '';
    public $updateUrl = '';
    public $inputOptions = [];
    public $shortLabel = '';

    public $optionsList = null;
    public $optionsListCallback = null;
    public $optionsListPrompt = true;

    public $useLocalStorage = false;
    public $name = '';

    public $displayEmptyValue = false;

    public $hide = false;
    public $skipExport = false;

    /**
     * @var \forma\extensions\editable\GridView
     */
    public $grid;

    protected $_tdOptions = [];
    protected $_tdContent = '';
    protected $_inputName = '';

    protected $_editableGridClass = 'forma\extensions\editable\GridView';

    /**
     * @var \yii\web\View the view instance
     */
    protected $_view;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->_view = $this->grid->getView();

        $this->initHiddenColumn();
        $this->setInputOptions();
        $this->registerAssets();
        $this->initLabel();
    }

    protected function initHiddenColumn()
    {
        $options = [];

        if ($this->hide) {
            $options = ['style' => 'display: none; width: auto;'];
        }
        if ($this->skipExport) {
            $options = ['class' => 'skip-export'];
        }
        $this->options
        = $this->headerOptions
        = $this->contentOptions
        = $this->footerOptions
        = $this->filterOptions
        = $options;
    }


    protected function registerAssets()
    {
        if (!Yii::$app->request->isPjax) {
            DataColumnAsset::register($this->_view);

            if ($this->pjaxContainer) {
                $js = "$(function() {
                    $('#{$this->pjaxContainer}').on('pjax:complete', EditableDataColumn.init);
                });";
                $this->_view->registerJs($js, View::POS_END);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function renderDataCell($model, $key, $index)
    {
        if ($this->contentOptions instanceof Closure) {
            $this->_tdOptions = call_user_func($this->contentOptions, $model, $key, $index, $this);
        } else {
            $this->_tdOptions = $this->contentOptions;
        }
        $this->setTdOptions();
        $this->setOptionsList($model);

        $this->_tdContent = $this->renderDataCellContent($model, $key, $index);

        if ($this->cellIsEmpty($this->_tdContent) && !$this->displayEmptyValue) {
            $this->_tdContent = null;
        }

        if ($this->cellIsUnequal() || !$this->isEditable) {
             return $this->renderTd();
        }

        if ($this->name) {
            $this->_inputName = $this->name;
            return $this->renderTextArea();
        }

        $attribute = $this->attribute;

        if (($pos = strrpos($attribute, '.')) !== false) {
            $model = $this->getRelation($model, $attribute);
            $attribute = substr($attribute, $pos + 1);
            $this->addInputOptions(['data-key' => $model->id]);
        }
        $this->_inputName = Html::getInputName($model, $attribute);

        return $this->inputType == self::INPUT_SELECT ?
            $this->renderDropDownList($model, $attribute) : $this->renderTextArea();
    }

    protected function cellIsUnequal()
    {
        if ($this->attribute == 'id') {
            return true;
        }
        if (!$this->attribute && !$this->name) {
            return true;
        }

        return false;
    }

    protected function cellIsEmpty($content)
    {
        return $content == $this->grid->formatter->nullDisplay;
    }

    protected function setInputOptions()
    {
        if (!empty($this->updateUrl)) {
            $this->addInputOptions(['data-update-url' => $this->updateUrl]);
        }
        if ($this->reloadPjax && $this->pjaxContainer) {
            $this->addInputOptions(['data-reload-pjax' => $this->pjaxContainer]);
        }
        if (!$this->isEditableGrid() && $this->useLocalStorage) {
            $this->addInputOptions(['data-local-storage' => '1']);
        }
        if ($this->isEditable) {
            $this->addInputOptions(['class' => self::IGNORE_EXPORT_CSS_CLASS]);
        }
    }

    protected function addInputOptions($options)
    {
        $this->inputOptions = array_merge($this->inputOptions, $options);
    }

    protected function setTdOptions()
    {
        if (!$this->grid->editableMode) {
            return;
        }
        $this->_tdOptions = array_merge($this->_tdOptions, [
            'class' => self::TD_CSS_CLASS,
            'data-is-editable' => (int)$this->isEditable,
        ]);
    }

    protected function setOptionsList($model)
    {
        if ($this->optionsListCallback instanceof Closure) {
            $this->optionsList = call_user_func($this->optionsListCallback, $model);
        }
    }

    protected function renderTd()
    {
        if ($this->inputType == self::INPUT_SELECT) {
            $this->_tdContent = $this->optionsList[$this->_tdContent] ?? null;
        }

        return Html::tag('td', $this->_tdContent, $this->_tdOptions);
    }

    protected function renderTextArea()
    {
        $textAreaHtml = Html::textarea($this->_inputName, $this->_tdContent, $this->inputOptions);
        return Html::tag('td', $this->_tdContent . $textAreaHtml, $this->_tdOptions);
    }

    protected function renderDropDownList($model, $attribute)
    {
        /** @var ListBehavior $model */
        $list = is_null($this->optionsList) ? $model->getList($attribute) : $this->optionsList;

        $options = [
            'options' => [$this->_tdContent => ['selected' => true]],
        ];
        if ($this->optionsListPrompt) {
            $options['prompt'] = '';
        }
        $this->addInputOptions($options);

        $selectHtml = Html::dropDownList($this->_inputName, null, $list, $this->inputOptions);

        if($this->_tdContent){
            if(array_key_exists($this->_tdContent,$list)){
                $tdContent = $list[$this->_tdContent];
            }else{
                $tdContent = null;
            }
        } else {
            $tdContent = null;
        }
        //$tdContent = $this->_tdContent ? $list[$this->_tdContent] : null;
        return Html::tag('td', $tdContent .  $selectHtml, $this->_tdOptions);
    }

    protected function getRelation($model, $attribute)
    {
        if (!($relationName = strstr($attribute, '.', true))) {
            return $model;
        }
        $pos = strpos($attribute, '.');
        return $this->getRelation($model->$relationName, substr($attribute, $pos + 1));
    }

    protected function isEditableGrid()
    {
        return $this->grid->className() == $this->_editableGridClass;
    }

    /**
     * @inheritdoc
     */
    protected function renderHeaderCellContent()
    {
        if (empty($this->shortLabel)) {
            return parent::renderHeaderCellContent();
        }

        $titleAttr = 'title="' . $this->getHeaderCellLabel() . '"';
        $dataOriginalLabelAttr = 'data-original-label="' . $this->getHeaderCellLabel() . '"';

        $content = $this->shortLabel;
        if (!in_array(mb_substr($content, -1), ['.', ')'])) {
            $content .= '...';
        }
        
        $label = "<span $titleAttr $dataOriginalLabelAttr>$content</span>";

        if ($this->attribute !== null && $this->enableSorting &&
            ($sort = $this->grid->dataProvider->getSort()) !== false && $sort->hasAttribute($this->attribute)) {
            return $sort->link($this->attribute, array_merge($this->sortLinkOptions, ['label' => $label]));
        }

        return $label;
    }

    protected function initLabel()
    {
        $this->label = $this->label ?: $this->getHeaderCellLabel();
    }
}
