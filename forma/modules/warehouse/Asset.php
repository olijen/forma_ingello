<?php

namespace forma\modules\warehouse;

use yii\web\AssetBundle;

class Asset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [];
    public $js = [
        'js/plugins/group-operation.plugin.js',
        'js/plugins/url-vars.plugin.js',
        'js/modules/warehouse/attachers.js',
    ];

    public $depends = [];
    public $jsOptions = ['position' => \yii\web\View::POS_END];
}
