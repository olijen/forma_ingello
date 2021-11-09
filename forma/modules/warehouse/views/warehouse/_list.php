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
                    data-confirm="Вы уверены, что хотите удалить этот элемент?"
            ><i class="fa fa-times"></i>
            </button>
        </div>

        <?php $increase = round(($model->getWarehouseProducts()->count()/$model->capacity) * 100,2);
        ?>
        <div class="info-box-content">
            <span class="info-box-text"><?= $model->name ?></span>
            <span class="info-box-number">Объекты: <?= $model->getWarehouseProducts()->count() ?></span>

            <div class="progress">
                <div class="progress-bar" style="width: <?= $increase ?>%; <?= (($increase>= 100)? 'background-color:red;':'') ?>"></div>
            </div>
            <span class="progress-description" style="<?= (($increase>= 100)? 'color:red;':'') ?>">
                Загружен на <?= $increase ?>%
            </span>
        </div>
    </div>
</a>
