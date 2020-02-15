<?php

namespace forma\extensions\kartik;

use kartik\dynagrid\DynaGrid as KartikDynaGrid;
use forma\extensions\editable\GridView;
use Yii;
use yii\helpers\Html;

class DynaGrid extends KartikDynaGrid
{
    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->gridOptions['id'] = $this->options['id'].'_';
        $this->gridOptions['emptyText'] = 'Поиск не дал результатов. <a onclick="window.history.back()">Вернуться назад</a>';
        $this->initWidget();

        echo Html::tag('div', GridView::widget($this->gridOptions), $this->options);
        $js = <<<JS
          $('#{$this->gridOptions['id']} select').on('change', function() {
            $("#{$this->gridOptions['id']}").yiiGridView("applyFilter");
          });
          $('#{$this->gridOptions['id']} input').on('change', function() {
            $("#{$this->gridOptions['id']}").yiiGridView("applyFilter");
          });
JS;
        Yii::$app->view->registerJs($js);


    }

    public function getViewPath()
    {
        return $this->_module->getViewPath();
    }
}
