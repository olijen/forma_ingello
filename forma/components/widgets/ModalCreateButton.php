<?php

namespace forma\components\widgets;

use yii\bootstrap\Widget;
use yii\helpers\Html;

class ModalCreateButton extends Widget
{
    public $route;
    public $selectId;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        echo Html::button('Добавить', [
            'class' => 'btn btn-success',
            'onclick' => '
                $.post(
                    "' . $this->route . '",
                    $($(this).parents("form")[0]).serialize()
                ).done(function(data) {
                    try {                        
                        var data = JSON.parse(data),
                            recordId = data.recordId,
                            recordName = data.recordName;
                            
                        $("#' . $this->selectId . '")
                        .append($(\'<option selected value="\' + recordId + \'">\' + recordName + \'</option>\'));
                        
                        $("#' . $this->selectId . '").blur();
                        
                        $("#modal-create").modal("toggle");
                    } catch(e) {
                        $("#modal-create .modal-dialog .modal-content .modal-body")
                        .html(data);
                    }
                    $.pjax.reload({container: "#pjax-multiselect-puck-unit"})
                });
            ',
        ]);

        echo '<script>
            $("#modal-create .modal-dialog .modal-content .modal-body form")
            .submit(function() {return false;});
        </script>';

        parent::run();
    }
}
