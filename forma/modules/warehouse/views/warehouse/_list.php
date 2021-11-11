<?php

use yii\helpers\Html;
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
                    onclick="confirmDelete(<?=$model->id?>)"
            ><i class="fa fa-times"></i>
            </button>
        </div>

        <?php (($model->capacity>0)?$increase = round(($model->getWarehouseProducts()->count()/$model->capacity) * 100,2):$increase=0) ;
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
<script>
    function confirmDelete(id)
    {
        let x = confirm("Вы уверены, что хотите удалить?");
        let w_id = id;

        if (x){
            $.ajax({
                type: "POST",
                url: "/warehouse/warehouse/delete?id="+w_id,
            }).done(function( msg ) {

            });
        }
        else{

        }
    }
</script>
