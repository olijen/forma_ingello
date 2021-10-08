<?php

namespace forma\components;

use forma\modules\product\records\Currency;
use Yii;
use moonland\phpexcel\Excel;

use forma\modules\warehouse\records\WarehouseProduct;
use forma\modules\product\records\Product;

use forma\modules\product\components\SkuGenerator;
use yii\helpers\ArrayHelper;

class ExcelImporter
{
    protected $_errors = [];
    protected $_warehouseId = null;

    protected $_excelFields = [
        'warehouse.name' => 'Склад',

        'category.name' => 'Категория',
        'manufacturer.name' => 'Производитель',
        //'country.name' => 'Страна',
        //'color.name' => 'Цвет',
        'type.name' => 'Группа товаров',

        'product.name' => 'Товар',
        'product.sku' => 'Артикул',
//        'product.proof' => 'Крепость',
//        'product.customs_code' => 'Таможенный код',
//        'product.year_chart' => 'Год производства',
//
//        'product.sizeColumnValue' => 'Размер',
//        'product.combinedColumn' => 'Дозатор / Рейтинг',
        'currency.code' => 'Валюта закупки',
        'warehouse_product.quantity' => 'Количество',
        'warehouse_product.purchase_cost' => 'Цена закупки',
        'warehouse_product.recommended_cost' => 'Рекомендованная цена',
        'warehouse_product.consumer_cost' => 'Розничная цена',
        'warehouse_product.trade_cost' => 'Оптовая цена',
        'warehouse_product.tax' => 'Налог',
        'warehouse_product.overhead_cost' => 'Накладной расход',
    ];

    protected function validateTable($row)
    {
        foreach ($this->_excelFields as $field => $label) {
            if (!isset($row[$label])) {
                $this->_errors[] = "Неверный формат таблицы. Отсутствует поле '$label'.";
                return false;
            }
        }
        return true;
    }

    public function import($excel)
    {
        $table = Excel::import($excel);

        foreach ($table as $row) {
            if (empty($row)) {
                continue;
            }

            foreach ($row as $field => &$value) {
                $value .= '';
            }

            if (!$this->validateTable($row)) {
                return false;
            }

            $warehouse = $this->getRelationIdByValue(
                '\forma\modules\warehouse\records\Warehouse',
                $row[$this->_excelFields['warehouse.name']]
            );
            if (!$warehouse->belongsToUser()) {
                $this->_errors[] = 'Невозможно добавить товар на склад другого пользователя';
                return false;
            } else {
                $this->_warehouseId = $warehouse->id;
            }
            
            $productName = $row[$this->_excelFields['product.name']];
            $product = Product::findOne(['name' => $productName]);
            if (!$product) {
                $product = new Product();
                $product->name = $productName;

                $product->category_id = $this->getRelationIdByValue(
                    '\forma\modules\product\records\Category',
                    $row[$this->_excelFields['category.name']]
                );
                $product->manufacturer_id = $this->getRelationIdByValue(
                    '\forma\modules\product\records\Manufacturer',
                    $row[$this->_excelFields['manufacturer.name']]
                );
//                $product->country_id = $this->getRelationIdByValue(
//                    '\forma\modules\country\records\Country',
//                    $row[$this->_excelFields['country.name']]
//                );
//                $product->color_id = $this->getRelationIdByValue(
//                    '\forma\modules\product\records\Color',
//                    $row[$this->_excelFields['color.name']]
//                );
                $product->type_id = $this->getRelationIdByValue(
                    '\forma\modules\product\records\Type',
                    $row[$this->_excelFields['type.name']]
                );

//                $product->pack_unit_id = $this->getPackUnitIdBySizeColumn(
//                    $row[$this->_excelFields['product.sizeColumnValue']]
//                );
//
//                $product->batcher = $this->getBatcherByCombinedColumn(
//                    $row[$this->_excelFields['product.combinedColumn']]
//                );
                $product->rating = $this->getRatingByCombinedColumn(
                    $row[$this->_excelFields['product.combinedColumn']]
                );


//                $product->volume = $this->getVolumeBySizeColumn(
//                    $row[$this->_excelFields['product.sizeColumnValue']]
//                );
//                $product->proof = $row[$this->_excelFields['product.proof']];
//                $product->customs_code = $row[$this->_excelFields['product.customs_code']];

//                $product->year_chart = isset($row[$this->_excelFields['product.year_chart']]) ?
//                    $row[$this->_excelFields['product.year_chart']] : null;

                $product->sku = SkuGenerator::generate(ArrayHelper::toArray($product));

                $product->save();

                if ($product->hasErrors()) {
                    $errors = $product->getErrors();
                    $attributeErrors = array_shift($errors);
                    $this->_errors[] = $attributeErrors[0];

                    return false;
                }
            }

            $warehouseProduct = WarehouseProduct::findOne([
                'warehouse_id' => $warehouse->id,
                'product_id' => $product->id,
            ]);
            if (!$warehouseProduct) {
                $warehouseProduct = new WarehouseProduct();
                $warehouseProduct->warehouse_id = $warehouse->id;
                $warehouseProduct->product_id = $product->id;
            }
            $currencyCode = $row[$this->_excelFields['currency.code']];
            $currency = Currency::findOne(['code'=>$currencyCode]);
            if(!$currency){
                $currency = new Currency();
                $currency->code = $currencyCode;
                $currency->save();
            }


            $warehouseProduct->quantity += $row[$this->_excelFields['warehouse_product.quantity']];

            $warehouseProduct->purchase_cost = $row[$this->_excelFields['warehouse_product.purchase_cost']];
            $warehouseProduct->recommended_cost = $row[$this->_excelFields['warehouse_product.recommended_cost']];
            $warehouseProduct->consumer_cost = $row[$this->_excelFields['warehouse_product.consumer_cost']];
            $warehouseProduct->trade_cost = $row[$this->_excelFields['warehouse_product.trade_cost']];

            $warehouseProduct->tax = $row[$this->_excelFields['warehouse_product.tax']];
            $warehouseProduct->overhead_cost = $row[$this->_excelFields['warehouse_product.tax']];
            $warehouseProduct->currency_id = $currency->id;
            $warehouseProduct->save();

            if ($warehouseProduct->hasErrors()) {
                $this->_errors = $warehouseProduct->getErrors();
//                $attributeErrors = array_shift($errors);
//                $this->_errors[] = $attributeErrors[0];

                return false;
            }
        }

        return true;
    }

//    protected function getBatcherByCombinedColumn($value)
//    {
//        if (!$value || mb_strpos($value, ' / ') === false) {
//            return null;
//        }
//
//        $batcherLabel = array_shift(explode(' / ', $value));
//        return Product::getBatcherIdByLabel($batcherLabel);
//    }

    protected function getRatingByCombinedColumn($value)
    {
        if (!$value) {
            return null;
        }

        $ratingLabel = array_pop(explode(' / ', $value));
        return (int)$ratingLabel;
    }

//    protected function getVolumeBySizeColumn($value)
//    {
//        if (!$value) {
//            return null;
//        }
//        $volumeLabel = array_pop(explode('x', $value));
//        return (int)$volumeLabel;
//    }

//    protected function getPackUnitIdBySizeColumn($value)
//    {
//        if (!$value || mb_strpos($value, 'x') === false) {
//            return null;
//        }
//        $packUnitLabel = array_shift(explode('x', $value));
//        /* @var $model \forma\modules\product\records\PackUnit */
//        return $this->getRelationIdByValue(
//            '\forma\modules\product\records\PackUnit',
//            (int)$packUnitLabel,
//            'bottles_quantity'
//        );
//    }
    
    protected function getRelationIdByValue($modelName, $value, $field = 'name')
    {
        if (!$value) {
            return null;
        }

        $model = $modelName::findOne([$field => $value]);

        if (!$model) {
            $model = new $modelName();
            $model->$field = $value;
            $model->save();
        }

        return $model;
    }

    public function getErrors()
    {
        return $this->_errors;
    }

    public function getWarehouseId()
    {
        return $this->_warehouseId;
    }
}
