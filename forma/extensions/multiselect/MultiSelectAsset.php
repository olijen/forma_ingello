<?php

namespace multiselect\multiselect;

use yii\web\AssetBundle;

class MultiSelectAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap-multiselect/dist';

    public $css = [
        'css/bootstrap-multiselect.css',
    ];

    public $js = [
        'js/bootstrap-multiselect.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}