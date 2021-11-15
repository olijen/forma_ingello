<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use forma\modules\test\records\TestType;

$this->title = 'Список типов тестов';

//$this->params['doc-page'] = 'Selling';

$list = [
    ['label' => 'Создать Тест', 'url' => '/test/main/create', 'icon' => 'plus',

    ],
    ['label' => 'Результаты тестов', 'url' => '/test/result/index', 'icon' => 'list',

    ],
];


?>
<div class="row">
    <div class="col-md-8">
        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'name',
                    'label' => 'Имя Теста',
                ],

                [
                    'buttons' => [
                        'check' => function ($url = '/test/test/test?id=', $model, $key) {
                            return Html::a('<span class="fa fa-check glyphicon glyphicon-check"></span>', '/test/test/test?id=' . $model->id, [
                                'title' => 'Прости тест',
                                'data-pjax' => '0',
                            ]);
                        },
                        'quality' => function ($url = 'url?', $model, $key) {
                            return Html::a('<span class="fa fa-check glyphicon glyphicon-list"></span>', 'url?' . $model->id, [
                                'title' => 'Список пройденнных тестов',
                                'data-pjax' => '0',
                            ]);
                        },
                        'update' => function ($url = '/test/test/index?id=', $model) {
                            return Html::a('<span class="fa fa-check glyphicon glyphicon-pencil"></span>', '/test/test/index?id=' . $model->id, [
                                'title' => 'Редактировать',
                            ]);
                        },
                    ],
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{delete} {update} {check} {quality}',

                ],
            ],
        ]); ?>
    </div>
    <div class="col-md-6>
        <div class="form-group">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <?php foreach ($list as $k => $item):
                    ?>
                    <a href="<?= $item['url'] ?>">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-<?= $item['icon'] ?>"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?= $item['label'] ?></span>

                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<!-- update Test" set "Кол-во пройденных" = `Кол-во` + 1 where id=idтеста -->