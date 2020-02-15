<?php

namespace multiselect\multiselect;

use yii\web\AssetBundle;

class MultiSelectCollapsibleOptGroupsAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap-multiselect/dist';

    public $js = [
        'js/bootstrap-multiselect-collapsible-groups.js'
    ];

    public $depends = [
        'multiselect\multiselect\MultiSelectAsset',
    ];
}