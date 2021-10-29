<?php

namespace forma\components\widgets;

class LinkWidgetAccess extends WidgetAccess
{
    public $title;
    public $link;
    public $params;

    public function printWidget(){

        if(empty($this->params)){
            echo "<a href=$this->link class='btn btn-success forma_blue'> <i class='fa fa-plus'></i> $this->title </a>";
        }else{
            $stringParams ="";
            foreach ($this->params as $key => $param){
                $stringParams .=$key .'='.$param.'&';
            }
            echo "<a href='$this->link?$stringParams' class='btn btn-success forma_blue'> <i class='fa fa-plus'></i> $this->title </a>";
        }

    }
}