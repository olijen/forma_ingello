<?php

use forma\modules\core\records\Accessory;

$accessory = \forma\modules\core\records\Accessory::find()->all();

    foreach($accessory as $item) {
        $className = explode('\\', $item->entity_class);
        $tableName = yii\helpers\Inflector::camel2id(array_pop($className));
    }

    foreach (Accessory::find()->all() as $accessory) {
        echo $class = explode('\\', $accessory->entity_class)[count(explode('\\', $accessory->entity_class))-1];
        Yii::debug($class);

        $realObject = $accessory->entity_class::find()->where('id=' . (int)$accessory->entity_id)->one();
        if (!$realObject) {
            Yii::debug($accessory->entity_id);
            $accessory->delete();
        }
        else {
            Yii::debug($accessory);
        }
    }


//    $tables = [
//        '\\forma\\modules\\selling\\records\\talk\\Answer',
//        '\\forma\\modules\\product\\records\\Category',
//        '\\forma\\modules\\product\\records\\Color',
//        '\\forma\\modules\\country\\records\\Country',
//        '\\forma\\modules\\product\\records\\Currency',
//        '\\forma\\modules\\customer\\records\\Customer',
//        '\\forma\\modules\\event\\records\\Event',
//        '\\forma\\modules\\event\\records\\EventType',
//        '\\forma\\modules\\product\\records\\Field',
//        '\\forma\\modules\\product\\records\\FieldProductValue',
//        '\\forma\\modules\\product\\records\\FieldValue',
//        '\\forma\\modules\\hr\\records\\interview\\Interview',
//        '\\forma\\modules\\hr\\records\\interviewvacancy\\InterviewVacancy',
//        '\\forma\\modules\\inventorization\\records\\Inventorization',
//        '\\forma\\modules\\inventorization\\records\\InventorizationProduct',
//        '\\forma\\modules\\core\\records\\Item',
//        '\\forma\\modules\\product\\records\\Manufacturer',
//        '\\forma\\modules\\message\\records\\Message',
//        '\\forma\\modules\\overheadcost\\records\\OverheadCost',
//        '\\forma\\modules\\product\\records\\PackUnit',
//        '\\forma\\modules\\selling\\records\\patient\\Patient',
//        '\\forma\\modules\\product\\records\\Product',
//        '\\forma\\modules\\product\\records\\ProductPackUnit',
//        '\\forma\\modules\\project\\records\\project\\Project',
//        '\\forma\\modules\\project\\records\\projectuser\\ProjectUser',
//        '\\forma\\modules\\project\\records\\projectuser\\ProjectUser',
//        '\\forma\\modules\\project\\records\\projectvacancy\\ProjectVacancy',
//        '\\forma\\modules\\purchase\\records\\purchase\\Purchase',
//        '\\forma\\modules\\purchase\\records\\purchase\\PurchaseOverheadCost',
//        '\\forma\\modules\\purchase\\records\\purchaseproduct\\PurchaseProduct',
//        '\\forma\\modules\\core\\records\\Regularity',
//        '\\forma\\modules\\selling\\records\\talk\\Request',
//        '\\forma\\modules\\selling\\records\\talk\\RequestStrategy',
//        '\\forma\\modules\\selling\\records\\selling\\Selling',
//        '\\forma\\modules\\selling\\records\\sellingproduct\\SellingProduct',
//        '\\forma\\modules\\selling\\records\\state\\State',
//        '\\forma\\modules\\selling\\records\\state\\StateToState',
//        '\\forma\\modules\\selling\\records\\strategy\\Strategy',
//        '\\forma\\modules\\supplier\\records\\Supplier',
//        '\\forma\\modules\\product\\records\\TaxRate',
//        '\\app\\modules\\test\\records\\Test',
//        '\\forma\\modules\\test\\records\\TestType',
//        '\\app\\modules\\test\\records\\TestTypeField',
//        '\\forma\\modules\\transit\\records\\transit\\Transit',
//        '\\forma\\modules\\transit\\records\\transit\\TransitOverheadCost',
//        '\\forma\\modules\\transit\\records\\transitproduct\\TransitProduct',
//        '\\forma\\modules\\product\\records\\Type',
//        '\\forma\\modules\\vacancy\\records\\Vacancy',
//        '\\forma\\modules\\warehouse\\records\\Warehouse',
//        '\\forma\\modules\\warehouse\\records\\WarehouseProduct',
//        '\\forma\\modules\\warehouse\\records\\WarehouseUser',
//        '\\forma\\modules\\worker\\records\\Worker',
//        '\\forma\\modules\\worker\\records\\workervacancy\\WorkerVacancy',
//    ];
//    foreach ($tables as $table) {
//        $one = [];
//        $key = '';
//        foreach ($table::find()->all() as $record) {
//            $key = '';
//            //Yii::debug($record);
//            foreach ($record->getAttributes() as $attribute => $value) {
//                if ($attribute == 'id') continue;
//                if ($attribute == 'updated_at') continue;
//                if ($attribute == 'created_at') continue;
//                $key .= $value;
//            }
//            //Yii::debug($key);
//            if (empty($one[$key])) {
//                $one[$key] = true;
//            } else {
//                //Yii::debug( $key . '<br>');
//                $record->delete();
//            }
//        }
//    }
//  //  exit;


?>