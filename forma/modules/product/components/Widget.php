<?php


namespace forma\modules\product\components;


class Widget
{


    public function DatePicker(){

        return DatePicker::widget([
            'name' => 'check_issue_date',
            'value' => date('d-M-Y', strtotime('+2 days')),
            'options' => ['placeholder' => 'Select issue date ...'],
            'pluginOptions' => [
                'format' => 'dd-mm-yyyy',
                'todayHighlight' => true
            ]
        ]);
    }


}