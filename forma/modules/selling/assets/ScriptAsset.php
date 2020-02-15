<?php

namespace forma\modules\selling\assets;


use yii\web\AssetBundle;

class ScriptAsset extends AssetBundle
{

    public function init()
    {
        $this->sourcePath = dirname(__DIR__) . '/web';
        parent::init();
    }

    public $js = [
        'js/script.js',
    ];

    public $css = [
        'css/style.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}