<?php

namespace forma\components\widgets;

use yii\bootstrap\Widget;

class ModalSrc extends Widget
{
    public $route;
    public $icon = 'file';
    public $name = 'Модальное';
    public $color = '#fff';
    public $btn = 'outline-secondary';

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        ?>
        <a
            id="info"
            style="color: <?=$this->color?>;"
            href="javascript:void(0)" 
            class="btn btn-<?=$this->btn?>"
            type="button"
            data-toggle="modal"
            data-target="#modal"
            onclick="$('#modal .modal-dialog .modal-content .modal-body').load('<?=$this->route?>');"
        >

            <i class="fa fa-<?=$this->icon?>"></i>
            <?=$this->name?>
        </a>
        <?php
    }
}
