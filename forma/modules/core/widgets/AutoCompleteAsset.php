<?php

namespace forma\modules\core\widgets;

use yii\web\AssetBundle;

class AutoCompleteAsset extends AssetBundle
{
    public $publishOptions = ['forceCopy' => true];

    public $sourcePath = __DIR__ . '/assets';

    public $js = [
        'js/autocomplete.qty-checker.js',
    ];

    public $depends = [
        'kartik\select2\Select2Asset',
    ];
}
