<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model forma\modules\selling\records\superselling\SellingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="selling-view" style="pointer-events: none;">
    <div class="row">
        <div class="col-md-12" style="padding: 10px;">
            <h3 style="text-align: center">Продажа № <?= $model->id ?></h3>
            <div class="col-md-4 col-sm-4 col-xs-12" style="margin: 0 0 10px;">
                <h3 style="text-align: center">Данные по клиенту</h3>
                <?= \yii\widgets\DetailView::widget([
                    'model' => $model,
                    'template' => "<tr><th style='width: 40%;'>{label}</th><td>{value}</td></tr>",
                    'attributes' => [
                        [
                            'label' => 'Компания',
                            'value' => (isset($model->customer->firm) ? $model->customer->firm : ''),
                        ],
                        [
                            'label' => 'Телефонный номер клиента',
                            'value' => (isset($model->customer->chief_phone) ? $model->customer->chief_phone : ''),
                        ],
                        [
                            'label' => 'Телефонный номер компании',
                            'value' => (isset($model->customer->chief_phone) ? $model->customer->chief_phone : ''),
                        ],
                        [
                            'label' => 'Почта компаниии',
                            'value' => (isset($model->customer->company_email) ? $model->customer->company_email : ''),
                        ],
                        [
                            'label' => 'Почта клиента',
                            'value' => (isset($model->customer->chief_email) ? $model->customer->company_email : ''),
                        ],
                        [
                            'label' => 'Вайбер',
                            'value' => (isset($model->customer->viber) ? $model->customer->viber : ''),
                        ],
                        [
                            'label' => 'Телеграм',
                            'value' => (isset($model->customer->telegram) ? $model->customer->telegram : ''),
                        ],
                        [
                            'label' => 'Вотсап',
                            'value' => (isset($model->customer->whatsapp) ? $model->customer->whatsapp : ''),
                        ],
                        [
                            'label' => 'Откуда пришел клиент',
                            'value' => (isset($model->customer->customerSource->name) ? $model->customer->customerSource->name : ''),
                        ],
                        [
                            'label' => 'Страна',
                            'value' => (isset($model->customer->country->name) ? $model->customer->country->name : ''),
                        ]
                    ],
                ]) ?>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12" style="margin: 0 0 10px;">
                <h3 style="text-align: center">Данные по товарам/услугам</h3>
                <?php
                $index = 1;
                foreach ($model->sellingProducts as $sellingProduct) {
                    if ($index <= 10) {
                        echo "<h4 style='text-align: left'>Код товара $sellingProduct->product_id</h4>";
                        echo \yii\widgets\DetailView::widget([
                            'model' => $model,
                            'template' => "<tr><th style='width: 30%;'>{label}</th><td>{value}</td></tr>",
                            'attributes' => [
                                [
                                    'label' => 'Название товар',
                                    'value' => (isset($sellingProduct->product->name) ? $sellingProduct->product->name : ''),
                                ],
                                [
                                    'label' => 'Цена продажи',
                                    'value' => (isset($sellingProduct->cost) ? number_format($sellingProduct->cost, 2) : ''),
                                ],
                                [
                                    'label' => 'Кол-во',
                                    'value' => (isset($sellingProduct->quantity) ? $sellingProduct->quantity : ''),
                                ],
                                [
                                    'label' => 'Cумма',
                                    'value' => ((isset($sellingProduct->quantity) && isset($sellingProduct->cost)) ? number_format($sellingProduct->quantity * $sellingProduct->cost, 2) : ''),
                                ],
                            ],
                        ]);
                        $index++;
                    }
                    else{
                        break;
                    }
                }
                ?>

            </div>
        </div>

    </div>

</div>