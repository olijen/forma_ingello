<?php

namespace forma\extensions\editable;

use yii\web\AssetBundle;

class GridViewAsset extends AssetBundle
{
    public $publishOptions = ['forceCopy' => true];

    public $sourcePath = __DIR__ . '/assets';

    public $css = [
        'css/editable-grid-view.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
