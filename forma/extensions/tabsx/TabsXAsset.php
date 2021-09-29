<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2021
 * @package yii2-tabsx
 * @version 1.2.8
 */

namespace forma\extensions\tabsx;

use kartik\base\PluginAssetBundle;

/**
 * Asset bundle for TabsX widget. Includes assets from bootstrap-tabsx plugin by Krajee.
 *
 * @see http://plugins.krajee.com/tabs-x
 * @see http://github.com/kartik-v/bootstrap-tabs-x
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class TabsXAsset extends PluginAssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/../bootstrap-tabs-x');
        $this->setupAssets('css', ['css/bootstrap-tabs-x' . (!$this->isBs(3) ? '-bs4' : '')]);
        $this->setupAssets('js', ['js/bootstrap-tabs-x']);
        parent::init();
    }
}
