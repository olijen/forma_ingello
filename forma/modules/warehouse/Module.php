<?php

namespace forma\modules\warehouse;

use forma\modules\inventorization\records\Inventorization;
use forma\modules\product\records\PackUnit;
use forma\modules\product\records\Product;
use forma\modules\warehouse\records\WarehouseProduct;
use forma\modules\warehouse\services\RemainsService;
use Yii;
use forma\modules\core\components\NomenclatureUnitInterface;
use forma\modules\transit\records\transit\Transit;
use forma\modules\selling\records\selling\Selling;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\core\components\NomenclatureInterface;
use forma\modules\warehouse\services\WarehouseService;
use yii\helpers\Url;
use yii\web\View;

/**
 * warehouse module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'forma\modules\warehouse\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Yii::$app->view->on(View::EVENT_BEFORE_RENDER, function($event) {
            Asset::register($event->sender);
        });
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        if (!Yii::$app->user->isGuest) {
            return true;
        } else {
            Yii::$app->getResponse()->redirect(Url::to(['/login']));
            return false;
        }
    }

    /**
     * @param NomenclatureInterface $nomenclature
     * @return bool
     */
    public function acceptance(NomenclatureInterface $nomenclature)
    {
        foreach ($nomenclature->getUnits() as $unit) {
            $result = WarehouseService::addProduct($unit, $nomenclature->getRelatedWarehouse());
            if (!$result) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param Transit $nomenclature
     * @return bool
     */
    public function move(Transit $nomenclature)
    {
        foreach ($nomenclature->getUnits() as $unit) {
            $result = WarehouseService::replaceProduct($unit);
            if (!$result) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param Selling $nomenclature
     * @return bool
     */
    public function depreciate(Selling $nomenclature)
    {
        foreach ($nomenclature->getUnits() as $unit) {
            $result = WarehouseService::removeProduct($unit, $nomenclature->getRelatedWarehouse());
            if (!$result) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param NomenclatureInterface $nomenclature
     * @return bool
     */
    public function createExpected(NomenclatureInterface $nomenclature)
    {
        $relatedWarehouse = $nomenclature instanceof Transit ?
            $nomenclature->toWarehouse : $nomenclature->getRelatedWarehouse();

        foreach ($nomenclature->getUnits() as $unit) {
            $result = WarehouseService::addExpectedProduct($unit, $relatedWarehouse);
            if (!$result) {
                return false;
            }
        }
        return true;
    }
    
    /**
     * @param NomenclatureInterface $nomenclature
     * @param Warehouse $warehouse
     * @return bool
     */
    public function removeEmpty(NomenclatureInterface $nomenclature, Warehouse $warehouse)
    {
        foreach ($nomenclature->getUnits() as $unit) {
            $result = WarehouseService::removeEmptyProduct($unit, $warehouse);
            if (!$result) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param NomenclatureUnitInterface $unit
     * @param Warehouse $warehouse
     * @return bool
     */
    public function removeEmptyUnit(NomenclatureUnitInterface $unit, Warehouse $warehouse)
    {
        return $result = WarehouseService::removeEmptyProduct($unit, $warehouse);
    }

    public function getRemains(Warehouse $warehouse)
    {
        return RemainsService::getByWarehouse($warehouse);
    }

    public function getListForInventorization($inventorizationId)
    {
        return WarehouseService::getListForInventorization($inventorizationId);
    }

    public function reviewsByInventorization($warehouseId)
    {
        return WarehouseService::reviewsByInventorization($warehouseId);
    }

    public function getProduct($warehouseProductId)
    {
        return RemainsService::get($warehouseProductId);
    }

    public function recalculate(Inventorization $inventorization)
    {
        $warehouse = $inventorization->warehouse;
        foreach ($inventorization->inventorizationProducts as $product) {
            if (!RemainsService::recalculate($warehouse, $product)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Pack. Pack-pack. Pack-pack-pack. Pack.
     *
     *_$$$____________________s$$$s
     *__$$$$_________________s$$$$$s
     *__$__$$_______________$$$$$a)$s
     *___$$_$$$____________$$$$$$$$$$
     *__$$_$___$__________$$$$$$$$
     *____$_$$$_$$_______$$$$$$$$
     *____$$_$$__$$$$$$$$$$$$$$$$
     *___$$_$__$$$$$$$$$$$$$$$$$s
     *____$$_$_$$$$$$$$$$_$$$$$$s
     *_____$$_$$$$$$$$$$$_J$$$$$$
     *_____$__$$$$$$$_____$$$$$$
     *_______$$$$_____$$$$$$$$$
     *_______$$__$$$$___$$$$$$
     *________$__$$$$$$$$$$$$
     *__________$$$$$$$$$$$
     *____________$$$$$$$
     *_____________$__$
     *_____________$__$
     *_____________$__$
     *_____________$$__$
     *___________$$_$$$_$$
     *
     * @param Warehouse $warehouse
     * @param Product $product
     * @param PackUnit|null $pack
     * @param $quantity
     * @return bool|float
     * @throws \Exception
     * @throws \yii\db\Exception
     */
    public function pack(Warehouse $warehouse, Product $product, PackUnit $pack = null, $quantity)
    {
        $success = true;
        $transaction = Yii::$app->db->beginTransaction();

        /* @var $product WarehouseProduct */
        $product = RemainsService::getByProductId($product->id, $warehouse->id);

        if ($quantity > $product->quantity) {
            throw new \Exception('Converted quantity cannot be more than it is in fact.');
        }

        $bottlesQty = $quantity;
        if ($product->product->packUnit) {
            $bottlesQty *= $product->product->packUnit->bottles_quantity;
        }

        $product->quantity -= $quantity;
        if (!$product->save()) {
            $success = false;
            echo 'product:'; var_dump($product->errors); die;
        }

        /* @var $module \forma\modules\product\Module */
        $module = Yii::$app->getModule('product');

        $variant = $module->getByPack($product->product, $pack);
        /* @var $variantIn WarehouseProduct */
        $variantIn = RemainsService::getByProductId($variant->id, $product->warehouse_id);

        if ($pack) {
            $resultQty = (int)($bottlesQty / $pack->bottles_quantity);
            $remainder = $bottlesQty % $pack->bottles_quantity;
        } else {
            $resultQty = $bottlesQty;
            $remainder = 0;
        }

        $variantIn->quantity += $resultQty;
        if (!$variantIn->save()) {
            $success = false;
            echo 'variantIn:'; var_dump($variantIn); die;
        }

        if ($remainder) {
            $original = $module->getByPack($product->product, null);
            /* @var $originalIn WarehouseProduct */
            $originalIn = RemainsService::getByProductId($original->id, $product->warehouse_id);
            $originalIn->quantity += $remainder;

            if (!$originalIn->save()) {
                $success = false;
                echo 'originalIn:';  var_dump($originalIn->errors); die;
            }
        }

        $success ? $transaction->commit() : $transaction->rollBack();

        return [$variantIn, $resultQty];
    }

    public function getProductCurrency(Warehouse $warehouse, Product $product)
    {
        /* @var $productIn WarehouseProduct */
        $productIn = RemainsService::getByProductId($product->id, $warehouse->id);
        return $productIn->currency;
    }
}
