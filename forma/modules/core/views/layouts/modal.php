<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

forma\assets\AppAsset::register($this);

$this->beginPage();

Html::csrfMetaTags();
$this->head();

$this->beginBody();

echo $content;

$this->endBody();

$this->endPage();
