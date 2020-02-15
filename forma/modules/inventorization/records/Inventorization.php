<?php

namespace forma\modules\inventorization\records;

use forma\modules\warehouse\records\Warehouse;
use Yii;
use yii\helpers\ArrayHelper;
use forma\modules\core\components\StateActiveRecord;

/**
 * This is the model class for table "inventorization".
 *
 * @property integer $id
 * @property integer $warehouse_id
 * @property string $name
 * @property string $date
 *
 * @property Warehouse $warehouse
 * @property InventorizationProduct[] $inventorizationProducts
 */
class Inventorization extends StateActiveRecord
{
    /**
     * @inheritdoc
     */
    public function states()
    {
        return [
            0 => StateInitial::class,
            1 => StateConfirm::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventorization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['warehouse_id'], 'required'],
            [['warehouse_id'], 'integer'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['warehouse_id' => 'id']],
        ];
    }

    public function beforeSave($insert)
    {
        $this->date = dateToDbFormat($this->date);

        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'warehouse_id' => 'Склад',
            'name' => 'Название',
            'date' => 'Дата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouse()
    {
        return $this->hasOne(Warehouse::className(), ['id' => 'warehouse_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventorizationProducts()
    {
        return $this->hasMany(InventorizationProduct::className(), ['inventorization_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return InventorizationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InventorizationQuery(get_called_class());
    }

    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    public function getWarehouseName()
    {
        return $this->warehouse->name;
    }
}
