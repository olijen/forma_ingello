<?php

use forma\modules\core\components\LinkHelper;
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




<div class="bs-example" >
    <div class="detached-block-example" style="margin-bottom: 10px"> Коммуникация
        <?php if (!isset($_GET['selling_token'])) { ?>
            <a class="btn btn-xs" style="color:blue"  href="/selling/main/show-selling?selling_token=<?=$model->selling_token?>"> <i class="fas fa-external-link-alt"></i> Ссылка для клиента</a>
            <a class="btn btn-xs" style="color:blue"  href="/selling/strategy/talk?id=<?=$model->id?>" id="selling-talk"> <i class="fa fa-comments"></i> Разговор по скрипту</a>
        <?php } ?>
    </div>

        <?php include_once 'history_dialog.php'?>


</div>






    <!--<script>
      var div = $("#chat");
      div.scrollTop(div.prop('scrollHeight'));
    </script>
    -->