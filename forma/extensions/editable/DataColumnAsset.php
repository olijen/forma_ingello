<?php

namespace forma\extensions\editable;

use yii\web\AssetBundle;

class DataColumnAsset extends AssetBundle
{
    public $publishOptions = ['forceCopy' => true];

    public $sourcePath = __DIR__ . '/assets';

    public $css = [
        'css/editable-data-column.css',
    ];

    public $js = [
        'js/editable-data-column.js',
        'js/local-storage-distributor.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'kartik\dialog\DialogAsset',
    ];
}
