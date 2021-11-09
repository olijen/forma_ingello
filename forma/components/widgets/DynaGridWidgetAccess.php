<?php

namespace forma\components\widgets;
use kartik\dynagrid\DynaGrid;
class DynaGridWidgetAccess extends WidgetAccess
{
    public $searchModel;
    public $columns;
    public $dataProvider;
    public $responsiveWrap;
    public $options;
    public $toolbar;

    public function printWidget(){

        echo DynaGrid::widget([
            'options' => ['id' => 'dyna-grid-' . $this->searchModel->tableName()],
            'theme' => 'panel-default',
            'columns' => $this->columns,
            'gridOptions' => [
                'dataProvider' => $this->dataProvider,
                'filterModel' => $this->searchModel,
                'responsiveWrap' => $this->responsiveWrap,

                'options' => $this->options,

                'toolbar' => $this->toolbar,
            ]
        ]);

    }
}