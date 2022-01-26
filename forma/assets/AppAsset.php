<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace forma\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    //public $sourcePath = __DIR__ . DIRECTORY_SEPARATOR . '..';

    public $js = [
        'js/site.js',
        'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js',

        'js/perfection.js',
        'js/plugins/jquery.fullscreen.js',

        ['js/SelectModal.js', 'position' => View::POS_END]
    ];

    public $css = [
        'css/site.css',

        'css/perfection.css',
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
        'kartik\dialog\DialogAsset',
    ];

    public $jsOptions = ['position' => View::POS_HEAD];
}
