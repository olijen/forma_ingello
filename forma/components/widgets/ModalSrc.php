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
    public $iframe = false;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        ?>
        <a
            id="<?=$this->options['id']?>"
            style="color: <?=$this->color?>;"
            href="javascript:void(0)" 
            class="btn btn-<?=$this->btn?>"
            type="button"
            data-toggle="modal"
            data-target="#modal"
            <?php if (!$this->iframe) : ?>
              onclick="$('#modal .modal-dialog .modal-content .modal-body').load('<?=$this->route?>');"
            <?php else : ?>
              onclick="$('#modal .modal-dialog .modal-content .modal-body').html(''); $('<iframe src=<?=$this->route?> style=width:100%;height:500px frameborder=0 id=myFrame></iframe>').appendTo('#modal .modal-dialog .modal-content .modal-body');"
            <?php endif ?>
        >

            <i class="fa fa-<?=$this->icon?>" style="font-size: 20px;"></i>
            <?=$this->name?>
        </a>
        <?php
    }
}
