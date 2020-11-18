<?php

namespace forma\components\widgets;

use yii\bootstrap\Widget;

class ModalCreate extends Widget
{
    public $route;

    public function init()
    {
        parent::init();
    }

    /*
     * Отвечат за конпку добовления в "Разговор по скрипту"
     * Пока эта кнопка не используется
     */
    public function run()
    {
        echo '<div class="input-group-prepend"><button class="btn btn-outline-secondary"
            type="button"
            data-toggle="modal"
            data-target="#modal-create"
            onclick="$(\'#modal-create .modal-dialog .modal-content .modal-body\').load(\'' . $this->route . '\');"
        ><i class="fa fa-plus"></i></button></div>';
    }
}
