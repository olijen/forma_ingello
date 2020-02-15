<?php

namespace forma\modules\transit\records\transit;

use forma\modules\core\components\TotalSumBehavior;
use forma\modules\warehouse\records\Warehouse;
use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use forma\modules\core\components\StateActiveRecord;
use forma\modules\core\components\NomenclatureInterface;
use forma\modules\transit\records\transitproduct\TransitProduct;

/**
 * This is the model class for table "transit".
 *
 * @property integer $id
 * @property integer $from_warehouse_id
 * @property integer $to_warehouse_id
 * @property string $name
 * @property string $date_create
 * @property string $date_complete
 *
 * @property Warehouse $fromWarehouse
 * @property Warehouse $toWarehouse
 * @property TransitProduct[] $transitProducts
 */
class Transit extends StateActiveRecord implements NomenclatureInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transit';
    }

    /**
     * @inheritdoc
     */
    public function states()
    {
        return [
            0 => StateInitial::class,
            1 => StateConfirm::class,
            // 2 => StateDeny::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public function getUnits()
    {
        return $this->transitProducts;
    }

    /**
     * @inheritdoc
     */
    public function getRelatedWarehouse()
    {
        return $this->fromWarehouse;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_warehouse_id', 'to_warehouse_id', 'name'], 'required'],
            [['from_warehouse_id', 'to_warehouse_id', 'state'], 'integer'],
            [['date_create', 'date_complete'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['from_warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['from_warehouse_id' => 'id']],
            [['to_warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['to_warehouse_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_warehouse_id' => 'Со склада',
            'to_warehouse_id' => 'В склад',
            'name' => 'Название',
            'date_create' => 'Дата создания',
            'date_complete' => 'Дата завершения',
            'state' => 'Состояние',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFromWarehouse()
    {
        return $this->hasOne(Warehouse::className(), ['id' => 'from_warehouse_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToWarehouse()
    {
        return $this->hasOne(Warehouse::className(), ['id' => 'to_warehouse_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransitProducts()
    {
        return $this->hasMany(TransitProduct::className(), ['transit_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return TransitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransitQuery(get_called_class());
    }

    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    public function getFromWarehouseName()
    {
        return $this->fromWarehouse->name;
    }

    public function getToWarehouseName()
    {
        return $this->toWarehouse->name;
    }

    //todo: вынести общее из двух методов
    public static function getDateCreateRange()
    {
        $range = (new Query())
            ->select(['MIN(date_create) AS min', 'MAX(date_create) AS max'])
            ->from(['transit'])
            ->one();

        $min = date('d.m.Y', strtotime($range['min']));
        $max = date('d.m.Y', strtotime($range['max']));

        return "$min - $max";
    }

    public static function getDateCompleteRange()
    {
        $range = (new Query())
            ->select(['MIN(date_complete) AS min', 'MAX(date_complete) AS max'])
            ->from(['transit'])
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

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'getTotalSum' => TotalSumBehavior::className(),
        ]);
    }
}
