<?php

namespace forma\modules\purchase\records\purchase;

use forma\modules\core\components\NomenclatureInterface;
use forma\modules\core\components\StateActiveRecord;
use forma\modules\core\components\TotalSumBehavior;
use forma\modules\overheadcost\services\OverheadCostService;
use forma\modules\product\services\TaxRateService;
use forma\modules\purchase\records\purchaseproduct\PurchaseProduct;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\supplier\records\Supplier;
use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use forma\modules\warehouse\records\WarehouseProduct;

/**
 * This is the model class for table "purchase".
 *
 * @property integer $id
 * @property integer $supplier_id
 * @property integer $warehouse_id
 * @property string $name
 * @property string $date_create
 * @property string $date_complete
 *
 * @property Supplier $supplier
 * @property Warehouse $warehouse
 * @property PurchaseProduct[] $purchaseProducts
 */
class Purchase extends StateActiveRecord
    implements NomenclatureInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase';
    }

    public function states()
    {
        return [
            0 => StateInitial::class,
            1 => StatePayment::class,
            2 => StateDelivery::class,
            3 => StateConfirm::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['warehouse_id'], 'required'],
            [['supplier_id', 'warehouse_id', 'state'], 'integer'],
            [['date_create', 'date_complete', 'supplier_id'], 'safe'],
//            ['supplier_id', 'validateSupplierDropdown'],
//            ['supplier_id', function ($attribute, $params, $model) {
//                $this->addError('supplier_id', 'Токен должен содержать буквы или цифры.');
//            }],
            [['name'], 'string', 'max' => 100],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['supplier_id' => 'id']],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['warehouse_id' => 'id']],

        ];
    }

//    public function validateSupplierDropdown()
//    {
//        $this->addError('supplier_id', 'Неправильное имя пользователя или пароль' . $this->supplier_id);
//    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'supplier_id' => 'Поставщик',
            'warehouse_id' => 'Склад',
            'name' => 'Коментарий',
            'date_create' => 'Дата создания',
            'date_complete' => 'Дата завершения',
            'state' => 'Состояние',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id' => 'supplier_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouse()
    {
        return $this->hasOne(Warehouse::className(), ['id' => 'warehouse_id']);
    }

    public function getUnits()
    {
        return $this->purchaseProducts;
    }

    public function getRelatedWarehouse()
    {
        return $this->warehouse;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseProducts()
    {
        return $this->hasMany(PurchaseProduct::className(), ['purchase_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PurchaseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PurchaseQuery(get_called_class());
    }

    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    public function getSupplierName()
    {
        return $this->supplier->name;
    }

    public function getWarehouseName()
    {
        return $this->warehouse->name;
    }

    //todo: вынести общее из двух методов
    public static function getDateCreateRange()
    {
        $range = (new Query())
            ->select(['MIN(date_create) AS min', 'MAX(date_create) AS max'])
            ->from(['purchase'])
            ->one();

        $min = date('d.m.Y', strtotime($range['min']));
        $max = date('d.m.Y', strtotime($range['max']));

        return "$min - $max";
    }

    public static function getDateCompleteRange()
    {
        $range = (new Query())
            ->select(['MIN(date_complete) AS min', 'MAX(date_complete) AS max'])
            ->from(['purchase'])
            ->one();

        $min = date('d.m.Y', strtotime($range['min']));
        $max = date('d.m.Y', strtotime($range['max']));

        return "$min - $max";
    }

    public function beforeSave($insert)
    {
        if ($this->date_create) {
            $this->date_create = date('Y-m-d H:i:s', strtotime($this->date_create));
        }
        if ($this->date_complete) {
            $this->date_complete = date('Y-m-d H:i:s', strtotime($this->date_complete));
        }

        return parent::beforeSave($insert);
    }

    public function getPrepaymentPercent()
    {
        $toPay = 0;
        $prepayment = 0;

        $units = PurchaseProduct::findAll(['purchase_id' => $this->id]);
        if (!$units) {
            return null;
        }

        foreach ($units as $unit) {
            // $overheadCost = OverheadCostService::getByNomenclatureUnit($unit);
            $taxCost = TaxRateService::getUnitTaxCost($unit);

            $toPay += ($unit->cost * $unit->quantity) + $taxCost;
            $prepayment += $unit->prepayment;
        }

        return (int)($prepayment / ($toPay / 100));
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            //'getTotalSum' => TotalSumBehavior::className(),
        ]);
    }
}
