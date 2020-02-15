<?php

namespace forma\modules\core\widgets;

use kartik\base\Widget;
use kartik\dialog\Dialog;
use kartik\grid\GridExportAsset;
use kartik\mpdf\Pdf;
use kartik\grid\GridView;
use Yii;
use yii\bootstrap\ButtonDropdown;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use kartik\grid\Module;
use kartik\base\Config;
use yii\web\View;

class ExportMenu extends Widget
{
    public $caption = '';

    public $export = [];
    public $exportConfig = [];
    public $exportContainer = [];
    public $exportConversions = [];
    
    public $krajeeDialogSettings = [];

    protected $_module;

    public function init()
    {
        $this->initModule();

        $this->initExport();
        if ($this->export !== false && isset($this->exportConfig[GridView::PDF])) {
            Config::checkDependency(
                'mpdf\Pdf',
                'yii2-mpdf',
                'for PDF export functionality. To include PDF export, follow the install steps below. If you do not ' .
                "need PDF export functionality, do not include 'PDF' as a format in the 'export' property. You can " .
                "otherwise set 'export' to 'false' to disable all export functionality"
            );
        }

        $this->registerAssets();
    }

    /**
     * @inheritdoc
     */
    protected function initModule()
    {
        if (!isset($this->moduleId)) {
            $this->_module = Module::getInstance();
            if (isset($this->_module)) {
                $this->moduleId = $this->_module->id;
                return;
            }
            $this->moduleId = Module::MODULE;
        }
        $this->_module = Config::getModule($this->moduleId, Module::className());
    }

    protected function pdfConfig()
    {
        $pdfHeader = [
            'L' => [
                'content' => 'Yii2 Grid Export (Я полковник)',
                'font-size' => 8,
                'color' => '#333333',
            ],
            'C' => [
                'content' => 'Grid Export',
                'font-size' => 16,
                'color' => '#333333',
            ],
            'R' => [
                'content' => 'Generated' . date('D, d-M-Y g:i a T'),
                'font-size' => 8,
                'color' => '#333333',
            ],
        ];

        $pdfFooter = [
            'L' => [
                'content' => '© Krajee Yii2 Extensions',
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

        $styleOptions = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => ['argb' => \PHPExcel_Style_Color::COLOR_BLACK],
                ],
                'inside' => [
                    'borderStyle' => \PHPExcel_Style_Border::BORDER_THIN,
                    'color' => ['argb' => \PHPExcel_Style_Color::COLOR_BLACK],
                ]
            ],
        ];

        return [
            //'cssFile' => '@webroot/css/export.css',
            'methods' => [
                'SetHeader' => [
                    ['odd' => $pdfHeader, 'even' => $pdfHeader],
                ],
                'SetFooter' => [
                    ['odd' => $pdfFooter, 'even' => $pdfFooter],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function initExport()
    {
        $this->exportConversions = array_replace_recursive(
            [
                ['from' => GridView::ICON_ACTIVE, 'to' => 'Active'],
                ['from' => GridView::ICON_INACTIVE, 'to' => 'Inactive'],
            ],
            $this->exportConversions
        );
        if (!isset($this->export['fontAwesome'])) {
            $this->export['fontAwesome'] = false;
        }
        $isFa = $this->export['fontAwesome'];
        $this->export = array_replace_recursive(
            [
                'label' => '',
                'icon' => $isFa ? 'share-square-o' : 'export',
                'messages' => [
                    'allowPopups' => 'Disable any popup blockers in your browser to ensure proper download.',
                    'confirmDownload' => 'Ok to proceed?',
                    'downloadProgress' => 'Generating the export file. Please wait...',
                    'downloadComplete' => 'Request submitted! You may safely close this dialog after saving your downloaded file.',
                ],
                'options' => ['class' => 'btn btn-default', 'title' => 'Export'],
                'menuOptions' => ['class' => 'dropdown-menu dropdown-menu-right '],
            ],
            $this->export
        );
        if (!isset($this->export['header'])) {
            $this->export['header'] = '<li role="presentation" class="dropdown-header">' .
                'Export Page Data' . '</li>';
        }
        if (!isset($this->export['headerAll'])) {
            $this->export['headerAll'] = '<li role="presentation" class="dropdown-header">' .
                'Export All Data' . '</li>';
        }
        $title = empty($this->caption) ? 'Grid Export' : $this->caption;
        $pdfHeader = [
            'L' => [
                'content' => 'Yii2 Grid Export (PDF)',
                'font-size' => 8,
                'color' => '#333333',
            ],
            'C' => [
                'content' => $title,
                'font-size' => 16,
                'color' => '#333333',
            ],
            'R' => [
                'content' => 'Generated' . ': ' . date('D, d-M-Y g:i a T'),
                'font-size' => 8,
                'color' => '#333333',
            ],
        ];
        $pdfFooter = [
            'L' => [
                'content' => '© Krajee Yii2 Extensions',
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
        $defaultExportConfig = [
            GridView::HTML => [
                'label' => 'HTML',
                'icon' => $isFa ? 'file-text' : 'floppy-saved',
                'iconOptions' => ['class' => 'text-info'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => 'grid-export',
                'alertMsg' => 'The HTML export file will be generated for download.',
                'options' => ['title' => 'Hyper Text Markup Language'],
                'mime' => 'text/html',
                'config' => [
                    'cssFile' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
                ],
            ],
            GridView::CSV => [
                'label' => 'CSV',
                'icon' => $isFa ? 'file-code-o' : 'floppy-open',
                'iconOptions' => ['class' => 'text-primary'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => 'grid-export',
                'alertMsg' => 'The CSV export file will be generated for download.',
                'options' => ['title' => 'Comma Separated Values'],
                'mime' => 'application/csv',
                'config' => [
                    'colDelimiter' => ',',
                    'rowDelimiter' => "\r\n",
                ],
            ],
            GridView::TEXT => [
                'label' => 'Text',
                'icon' => $isFa ? 'file-text-o' : 'floppy-save',
                'iconOptions' => ['class' => 'text-muted'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => 'grid-export',
                'alertMsg' => 'The TEXT export file will be generated for download.',
                'options' => ['title' => 'Tab Delimited Text'],
                'mime' => 'text/plain',
                'config' => [
                    'colDelimiter' => "\t",
                    'rowDelimiter' => "\r\n",
                ],
            ],
            GridView::EXCEL => [
                'label' => 'Excel',
                'icon' => $isFa ? 'file-excel-o' : 'floppy-remove',
                'iconOptions' => ['class' => 'text-success'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => 'grid-export',
                'alertMsg' => 'The EXCEL export file will be generated for download.',
                'options' => ['title' => 'Microsoft Excel 95+'],
                'mime' => 'application/vnd.ms-excel',
                'config' => [
                    'worksheet' => 'ExportWorksheet',
                    'cssFile' => '',
                ],
            ],
            GridView::PDF => [
                'label' => 'PDF',
                'icon' => $isFa ? 'file-pdf-o' : 'floppy-disk',
                'iconOptions' => ['class' => 'text-danger'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => 'grid-export',
                'alertMsg' => 'The PDF export file will be generated for download.',
                'options' => ['title' => 'Portable Document Format'],
                'mime' => 'application/pdf',
                'config' => [
                    'mode' => 'UTF-8',
                    'format' => 'A4-L',
                    'destination' => 'D',
                    'marginTop' => 20,
                    'marginBottom' => 20,
                    'cssInline' => '.kv-wrap{padding:20px;}' .
                        '.kv-align-center{text-align:center;}' .
                        '.kv-align-left{text-align:left;}' .
                        '.kv-align-right{text-align:right;}' .
                        '.kv-align-top{vertical-align:top!important;}' .
                        '.kv-align-bottom{vertical-align:bottom!important;}' .
                        '.kv-align-middle{vertical-align:middle!important;}' .
                        '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
                        '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
                        '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
                    'methods' => [
                        'SetHeader' => [
                            ['odd' => $pdfHeader, 'even' => $pdfHeader],
                        ],
                        'SetFooter' => [
                            ['odd' => $pdfFooter, 'even' => $pdfFooter],
                        ],
                    ],
                    'options' => [
                        'title' => $title,
                        'subject' => 'PDF export generated by kartik-v/yii2-grid extension',
                        'keywords' => 'krajee, grid, export, yii2-grid, pdf',
                    ],
                    'contentBefore' => '',
                    'contentAfter' => '',
                ],
            ],
            GridView::JSON => [
                'label' => 'JSON',
                'icon' => $isFa ? 'file-code-o' : 'floppy-open',
                'iconOptions' => ['class' => 'text-warning'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => 'grid-export',
                'alertMsg' => 'The JSON export file will be generated for download.',
                'options' => ['title' => 'JavaScript Object Notation'],
                'mime' => 'application/json',
                'config' => [
                    'colHeads' => [],
                    'slugColHeads' => false,
                    'jsonReplacer' => new JsExpression("function(k,v){return typeof(v)==='string'?$.trim(v):v}"),
                    'indentSpace' => 4,
                ],
            ],
        ];

        // Remove PDF if dependency is not loaded.
        if (!class_exists('\\kartik\\mpdf\\Pdf')) {
            unset($defaultExportConfig[GridView::PDF]);
        }

        $this->exportConfig = self::parseExportConfig($this->exportConfig, $defaultExportConfig);
    }

    /**
     * @inheritdoc
     */
    protected static function parseExportConfig($exportConfig, $defaultExportConfig)
    {
        if (is_array($exportConfig) && !empty($exportConfig)) {
            foreach ($exportConfig as $format => $setting) {
                $setup = is_array($exportConfig[$format]) ? $exportConfig[$format] : [];
                $exportConfig[$format] = empty($setup) ? $defaultExportConfig[$format] :
                    array_replace_recursive($defaultExportConfig[$format], $setup);
            }
            return $exportConfig;
        }
        return $defaultExportConfig;
    }

    public function run()
    {
        return $this->renderExport();
    }

    /**
     * @inheritdoc
     */
    public function renderExport()
    {
        if ($this->export === false || !is_array($this->export) ||
            empty($this->exportConfig) || !is_array($this->exportConfig)
        ) {
            return '';
        }
        $title = $this->export['label'];
        $icon = $this->export['icon'];
        $options = $this->export['options'];
        $menuOptions = $this->export['menuOptions'];
        $iconPrefix = $this->export['fontAwesome'] ? 'fa fa-' : 'glyphicon glyphicon-';
        $title = ($icon == '') ? $title : "<i class='{$iconPrefix}{$icon}'></i> {$title}";
        if (!isset($this->_module->downloadAction)) {
            $action = ["/{$this->moduleId}/export/download"];
        } else {
            $action = (array) $this->_module->downloadAction;
        }
        $encoding = ArrayHelper::getValue($this->export, 'encoding', 'utf-8');
        $bom = ArrayHelper::getValue($this->export, 'bom', true);
        $target = ArrayHelper::getValue($this->export, 'target', GridView::TARGET_POPUP);
        $formOptions = [
            'class' => 'kv-export-form',
            'style' => 'display:none',
            'target' => ($target == GridView::TARGET_POPUP) ? 'kvDownloadDialog' : $target,
        ];
        $form = Html::beginForm($action, 'post', $formOptions) . "\n" .
            Html::hiddenInput('module_id', $this->moduleId) . "\n" .
            Html::hiddenInput('export_hash') . "\n" .
            Html::hiddenInput('export_filetype') . "\n" .
            Html::hiddenInput('export_filename') . "\n" .
            Html::hiddenInput('export_mime') . "\n" .
            Html::hiddenInput('export_config') . "\n" .
            Html::hiddenInput('export_encoding', $encoding) . "\n" .
            Html::hiddenInput('export_bom', $bom) . "\n" .
            Html::textarea('export_content') . "\n" .
            Html::endForm();
        $items = empty($this->export['header']) ? [] : [$this->export['header']];
        foreach ($this->exportConfig as $format => $setting) {
            $iconOptions = ArrayHelper::getValue($setting, 'iconOptions', []);
            Html::addCssClass($iconOptions, $iconPrefix . $setting['icon']);
            $label = (empty($setting['icon']) || $setting['icon'] == '') ? $setting['label'] :
                Html::tag('i', '', $iconOptions) . ' ' . $setting['label'];
            $mime = ArrayHelper::getValue($setting, 'mime', 'text/plain');
            $config = ArrayHelper::getValue($setting, 'config', []);
            if ($format === GridView::JSON) {
                unset($config['jsonReplacer']);
            }
            $dataToHash = $this->moduleId . $setting['filename'] . $mime . $encoding . $bom . Json::encode($config);
            $hash = Yii::$app->security->hashData($dataToHash, $this->_module->exportEncryptSalt);
            $items[] = [
                'label' => $label,
                'url' => '#',
                'linkOptions' => [
                    'class' => 'export-' . $format,
                    'data-mime' => $mime,
                    'data-hash' => $hash,
                ],
                'options' => $setting['options'],
            ];
        }
        $itemsBefore = ArrayHelper::getValue($this->export, 'itemsBefore', []);
        $itemsAfter = ArrayHelper::getValue($this->export, 'itemsAfter', []);
        $items = ArrayHelper::merge($itemsBefore, $items, $itemsAfter);
        return ButtonDropdown::widget(
            [
                'label' => $title,
                'dropdown' => ['items' => $items, 'encodeLabels' => false, 'options' => $menuOptions],
                'options' => $options,
                'containerOptions' => $this->exportContainer,
                'encodeLabel' => false,
            ]
        ) . $form;
    }

    protected function registerAssets()
    {
        // DynaGridAsset::register($this->view);
        Dialog::widget($this->krajeeDialogSettings);
        if ($this->export !== false && is_array($this->export) && !empty($this->export)) {
            $gridId = 'purchase-nomenclature-grid'; // <!----

            GridExportAsset::register($this->view);
            $target = ArrayHelper::getValue($this->export, 'target', GridView::TARGET_BLANK);
            $gridOpts = Json::encode(
                [
                    'gridId' => $gridId,
                    'target' => $target,
                    'messages' => $this->export['messages'],
                    'exportConversions' => $this->exportConversions,
                    'showConfirmAlert' => ArrayHelper::getValue($this->export, 'showConfirmAlert', true),
                ]
            );
            $gridOptsVar = 'kvGridExp_' . hash('crc32', $gridOpts);
            $this->view->registerJs("var {$gridOptsVar}={$gridOpts};", View::POS_HEAD);
            foreach ($this->exportConfig as $format => $setting) {
                $id = "$('#{$gridId} .export-{$format}')"; // <-----
                $genOpts = Json::encode(
                    [
                        'filename' => $setting['filename'],
                        'showHeader' => $setting['showHeader'],
                        'showPageSummary' => $setting['showPageSummary'],
                        'showFooter' => $setting['showFooter'],
                    ]
                );
                $genOptsVar = 'kvGridExp_' . hash('crc32', $genOpts);
                $this->view->registerJs("var {$genOptsVar}={$genOpts};", View::POS_HEAD);
                $expOpts = Json::encode(
                    [
                        'dialogLib' => ArrayHelper::getValue($this->krajeeDialogSettings, 'libName', 'krajeeDialog'),
                        'gridOpts' => new JsExpression($gridOptsVar),
                        'genOpts' => new JsExpression($genOptsVar),
                        'alertMsg' => ArrayHelper::getValue($setting, 'alertMsg', false),
                        'config' => ArrayHelper::getValue($setting, 'config', []),
                    ]
                );
                $expOptsVar = 'kvGridExp_' . hash('crc32', $expOpts);
                $this->view->registerJs("var {$expOptsVar}={$expOpts};", View::POS_HEAD);
                // $script .= "{$id}.gridexport({$expOptsVar});";
            }
        }
    }
}
