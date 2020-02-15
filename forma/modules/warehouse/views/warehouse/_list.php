<?php

use yii\helpers\Url;

/* @var $model \forma\modules\warehouse\records\Warehouse */

?>

<a href="<?= Url::to(['view', 'id' => $model->id]) ?>" class="list-card">
    <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-th"></i></span>

        <div class="box-tools pull-right">
            <button class="btn btn-box-tool list-card-btn"
                    data-link="<?= Url::to(['update', 'id' => $model->id]) ?>"
                    data-method="get"
            ><i class="fa fa-edit"></i>
            </button>
            <button class="btn btn-box-tool list-card-btn"
                    data-link="<?= Url::to(['delete', 'id' => $model->id]) ?>"
                    data-method="post"
            ><i class="fa fa-times"></i>
            </button>
        </div>

        <?php $increase = rand(0, 1000) / 10; ?>
        <div class="info-box-content">
            <span class="info-box-text"><?= $model->name ?></span>
            <span class="info-box-number">Объекты: <?= $model->getWarehouseProducts()->count() ?></span>

            <div class="progress">
                <div class="progress-bar" style="width: <?= $increase ?>%"></div>
            </div>
            <span class="progress-description">
                Загружен на <?= $increase ?>%
            </span>
        </div>
    </div>
</a>
