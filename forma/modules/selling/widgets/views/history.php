<?php
use yii\bootstrap\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use forma\modules\selling\records\selling\StateConfirm;
use forma\modules\core\widgets\DetachedBlock;
use vova07\imperavi\Widget;

/**
 * @var Selling $model
 */

?>



<?php DetachedBlock::begin(['example' => 'Комунникация']); ?>
<div class="row">

    <?php include_once 'history_dialog.php'?>
</div>

    <?php DetachedBlock::end() ?>




    <!--<script>
      var div = $("#chat");
      div.scrollTop(div.prop('scrollHeight'));
    </script>
    -->