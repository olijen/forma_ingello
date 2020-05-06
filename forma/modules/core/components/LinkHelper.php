<?php

namespace forma\modules\core\components;

use yii\bootstrap\Button;

class LinkHelper
{
    //Создание функции котораяя находит в тексте Url подобного типа {{/core/item||Название кнопки}} и превращение его в модальное окно
    // или {{https://google.com||Название кнопки}} и превращение его в кновку
    public static function replaceUrlOnButton($text)
    {
        if (strripos($text, "{{/")) {//если ссылка внутренняя то она превратится в модальное окно
            $text = str_ireplace("{{",
                "<a  style=\"color: blue;\"  
                        href=\"javascript:void(0)\"
                        class=\"btn btn-outline-secondary\" 
                        type=\"button\" data-toggle=\"modal\" 
                        data-target=\"#modal\" 
                        onclick=\"$('#modal .modal-dialog .modal-content .modal-body').html(''); 
                                  $('<iframe src= ", $text);

            $text = str_ireplace("||",
                "?without-header'
                        + ' style=width:100%;height:500px ' 
                        + 'frameborder=0 id=myFrame></iframe>')
                        .appendTo('#modal .modal-dialog .modal-content .modal-body');\">
                        <i class=\"fa fa-eye\"></i>", $text);
            $text = str_ireplace("}}", "</a>", $text);
            echo $text;
        } else {// если ссылка вняшняя то превратится в кнопку
            $text = str_ireplace("{{", "<a onclick=\"window.open(' ", $text);
            $text = str_ireplace("||", " ', 'Window', 
                'width=600,height=600,left=600')\" 
                 class=\"btn btn-primary btn-xs\">", $text);
            $text = str_ireplace("}}", "</a>", $text);
            echo $text;
        }
    }




}