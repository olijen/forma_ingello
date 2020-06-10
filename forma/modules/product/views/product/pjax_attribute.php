<?php


use forma\modules\product\components\SystemWidget;
use forma\modules\product\records\FieldProductValue;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use forma\components\widgets\ModalCreate;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use forma\modules\product\records\Product;
use kartik\select2\Select2;
use forma\modules\product\records\PackUnit;
use forma\modules\core\widgets\DetachedBlock;
use forma\modules\product\records\Type;
use forma\modules\product\records\Manufacturer;
use yii\web\View;
use forma\modules\product\records\Category;
use kartik\color\ColorInput;
use forma\modules\product\records\Color;
use yii\widgets\Pjax;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\daterange\DateRangePicker;
use kartik\datetime\DateTimePicker;
?>


<button class="btn btn-secondary">
    <a href="/product/category/create"
       onClick="return (confirm('Вы пытаетесь перейти на страницу создания категории, если вы продолжите, все данные с этой страницы не сохранятся!'))?true:false;">
        Создать новую категорию
    </a>
</button>
<?php if (isset($category_id)):?>
<button class="btn btn-secondary">
    <a href="/product/category/update?id=<?= $category_id?>" onClick="return (confirm('Вы пытаетесь перейти на страницу редактирования категории, если вы продолжите, все данные с этой страницы не сохранятся!'))?true:false;">
        Редактировать текущую категорию
    </a>
</button>
</br> </br>
<?php endif;?>
<?php
Pjax::begin([
    'enablePushState' => false,
]);?>

<?php if (!empty($fieldAttributes)):?>




   <?php foreach ($fieldAttributes as $key => $fieldAttribute) {
        echo SystemWidget::getByName($key, $fieldAttribute, true);
        echo '</br>';
    }
    ?>

<?php else:?>
    </br></br>
<?='В данной категории нет дополнительных характеристик';
?>

<?php endif;?>

<?php
Pjax::end();
?>


