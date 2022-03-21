<?php

namespace forma\extensions\editable;

use Yii;
use kartik\grid\GridView as KartikGridView;
use forma\components\CombinedDataColumn;
use yii\grid\Column;
use yii\base\InvalidConfigException;
use yii\grid\SerialColumn;
use kartik\grid\SerialColumn as KartikSerialColumn;
use yii\helpers\Url;

class GridView extends KartikGridView
{
    const IGNORE_EXPORT_CSS_CLASS = 'skip-export';

    public $editableMode = true;
    public $isEditable = true;

    public $updateUrl = '';
    public $pjaxContainer = '';

    public $enableExport = true;

    public $useLocalStorage = false;
    public $tableKey = '';

    public $dataColumnClass = '';

    public $displayEmptyValue = false;

    public $export = [];

    protected $_dataColumnClass = 'forma\extensions\editable\DataColumn';
    protected $_actionColumnClass = 'yii\grid\ActionColumn';
    protected $_gridCssClass = 'editable-grid';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->validateConfig();

        parent::init();

        $this->setOptions();
        $this->setTableOptions();
        $this->setExportConfig();
        $this->setExportColumns();
    }

    protected function validateConfig()
    {
        if ($this->editableMode && empty($this->updateUrl)) {
            throw new InvalidConfigException('Property updateUrl cannot be blank');
        }
        if ($this->useLocalStorage && empty($this->tableKey)) {
            throw new InvalidConfigException('Property tableKey cannot be blank form local storage mode');
        }
    }

    protected function setOptions()
    {
        $this->options = array_merge($this->options, ['class' => $this->_gridCssClass]);
    }

    protected function setExportConfig()
    {
        $this->enableExport = $this->enableExport ?? !$this->gridIsEmpty();
        if (!$this->enableExport) {
            return;
        }

        $this->layout = ' {export}' . ' ' . '{toggleData}' . $this->layout;

        $this->_module->downloadAction = Url::to(['/core/export/download']);

        $this->export = array_merge($this->export, [
            'showConfirmAlert' => false,
            'target' => parent::TARGET_SELF,
            'fontAwesome' => true,
        ]);

        $pdfHeader = [
            'L' => [
                'content' => '',
            ],
            'C' => [
                'content' => Yii::$app->view->title,
                'font-style' => 'B',
                'font-size' => 12,
                'color' => '#333333',
            ],
            'R' => [
                'content' => 'Generated' . ': ' . Yii::$app->formatter->asDatetime(time(), 'php:d.m.Y H:i:s'),
                'font-size' => 8,
                'color' => '#333333',
            ],
        ];
        $pdfFooter = [
            'L' => [
                'content' => 'Warehouse',
                'font-size' => 8,
                'font-style' => 'B',
                'color' => '#999999',
            ],
            'R' => [
                'content' => '[ {PAGENO} ]',
                'font-size' => 10,
                'font-style' => 'B',
                'font-family' => 'serif',
                'color' => '#333333',
            ],
            'line' => true,
        ];

        $this->exportConfig = array_merge($this->exportConfig, [
            parent::PDF => [
                'config' => [
                    'methods' => [
                        'SetHeader' => [
                            ['odd' => $pdfHeader, 'even' => $pdfHeader],
                        ],
                        'SetFooter' => [
                            ['odd' => $pdfFooter, 'even' => $pdfFooter],
                        ],
                    ],
                ],
            ],
            parent::EXCEL => [],
            parent::HTML => [],
            parent::JSON => [
                'config' => [
                    'colHeads' => $this->getJsonLabels(),
                ],
            ],
        ]);
    }

    protected function disabledExportColumns()
    {
        return [
            'yii\grid\ActionColumn',
            'yii\grid\CheckboxColumn',
            'kartik\grid\CheckboxColumn',
            [
                'class' => 'yii\grid\SerialColumn',
                'only' => ['xls', 'json'],
            ],
            [
                'class' => 'kartik\grid\SerialColumn',
                'only' => ['xls', 'json'],
            ],
        ];
    }

    protected function setExportColumns()
    {
        /* @var $column Column */
        foreach ($this->columns as $column) {
            $this->tuneExportColumn($column);
        }
    }

    protected function tuneExportColumn($column)
    {
        $cssClass = '';
        foreach ($this->disabledExportColumns() as $rule) {
            /* @var $column Column */
            if (is_string($rule) && $rule == $column::className()) {
                $cssClass .= static::IGNORE_EXPORT_CSS_CLASS;
            } elseif (is_array($rule) && $rule['class'] == $column::className()) {
                array_splice($rule['only'], 0, 0, '');
                $cssClass .= implode(' ' . static::IGNORE_EXPORT_CSS_CLASS . '-', $rule['only']);
            }
        }

        $optionsProps = [
            'options',
            'headerOptions',
            'contentOptions',
            'footerOptions',
            'filterOptions',
        ];
        foreach ($optionsProps as $prop) {
            $this->addCssClassToColumn($column, $cssClass, $prop);
        }
    }

    protected function addCssClassToColumn($column, $class, $optionsProp = 'options')
    {
        $column->$optionsProp['class'] = $column->$optionsProp['class'] ?? '';
        $column->$optionsProp['class'] .= " $class";
    }

    protected function setTableOptions()
    {
        $tableOptions = [];
        if ($this->editableMode) {
            $tableOptions['data-update-url'] = $this->updateUrl;
        }
        if ($this->useLocalStorage) {
            $tableOptions['data-local-storage'] = '1';
            $tableOptions['data-table-key'] = $this->tableKey;
        }
        $this->tableOptions = array_merge($this->tableOptions, $tableOptions);
    }

    protected function registerAssets()
    {
        parent::registerAssets();

        if (!Yii::$app->request->isPjax) {
            GridViewAsset::register($this->view);
        }
        return null;
    }

    protected function gridIsEmpty()
    {
        return $this->dataProvider->getTotalCount() < 1;
    }

    /**
     * @inheritdoc
     */
    public function renderTableHeader()
    {
        if (!$this->gridIsEmpty()) {
            return parent::renderTableHeader();
        }
        return '';
    }

    protected function getEditableColumnParams()
    {
        return [
            'isEditable' => $this->editableMode && $this->isEditable,
            'useLocalStorage' => $this->useLocalStorage,
            'pjaxContainer' => $this->pjaxContainer,
            'displayEmptyValue' => $this->displayEmptyValue,
        ];
    }

    /**
     * @inheritdoc
     */
    protected function initColumns()
    {
        if (empty($this->columns)) {
            $this->guessColumns();
        }
        foreach ($this->columns as $i => $column) {
            if (is_string($column)) {
                $column = $this->createDataColumn($column);
            } else {
                if ($this->isActionColumn($column) && $this->editableMode && !$this->isEditable) {
                    unset($this->columns[$i]);
                    continue;
                }

                $params = [
                    'class' => $this->dataColumnClass ?: $this->_dataColumnClass,
                    'grid' => $this,
                ];
                if ($this->isEditableColumn($column)) {
                    $params = array_merge($params, $this->getEditableColumnParams());
                }
                $column = Yii::createObject(array_merge($params, $column));
            }
            if (!$column->visible) {
                unset($this->columns[$i]);
                continue;
            }
            $this->columns[$i] = $column;
        }
    }

    protected function isActionColumn($column)
    {
        if (!isset($column['class'])) {
            return false;
        }
        return $column['class'] == $this->_actionColumnClass;
    }

    protected function isEditableColumn($column)
    {
        if (!isset($column['class'])) {
            return true;
        }
        if ($column['class'] != $this->dataColumnClass) {
            return false;
        }
        return true;
    }

    /**
     * @inheritdoc
     */
    protected function createDataColumn($text)
    {
        if (!preg_match('/^([^:]+)(:(\w*))?(:(.*))?$/', $text, $matches)) {
            throw new InvalidConfigException('The column must be specified in the format of "attribute", "attribute:format" or "attribute:format:label"');
        }

        return Yii::createObject(array_merge([
            'class' => $this->dataColumnClass ?: $this->_dataColumnClass,
            'grid' => $this,
            'attribute' => $matches[1],
            'format' => isset($matches[3]) ? $matches[3] : 'text',
            'label' => isset($matches[5]) ? $matches[5] : null,
        ], $this->getEditableColumnParams()));
    }

    protected function getJsonLabels()
    {
       $labels = [];
        /* @var $column Column */
        foreach ($this->columns as $column) {
            if (isset($column->skipExport) && $column->skipExport) {
                continue;
            }
            if ($column instanceof SerialColumn || $column instanceof KartikSerialColumn) {
                continue;
            }
            if($column instanceof CombinedDataColumn) {
                $labels[] = strip_tags($column->renderHeaderCell());
            } elseif (isset($column->label) || !empty($column->label)) {
                $labels[] = $column->label;
            } elseif(isset($column->header) || !empty($column->header)) {
                $labels[] = $column->header;
            }
        }
        return $labels;
    }
}
