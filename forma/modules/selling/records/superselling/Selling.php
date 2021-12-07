<?php

namespace forma\modules\selling\records\superselling;

use forma\components\AccessoryActiveRecord;
use forma\modules\customer\records\Customer;
use forma\modules\event\records\Event;
use forma\modules\selling\records\sellingproduct\SellingProduct;
use forma\modules\selling\records\state\State;
use forma\modules\warehouse\records\Warehouse;
use Yii;

/**
 * This is the model class for table "selling".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $warehouse_id
 * @property integer $state_id
 * @property string $name
 * @property string $date_create
 * @property string $date_complete
 * @property string $dialog
 * @property string $next_step
 * @property string $selling_token
 *
 * @property Event[] $events
 * @property Customer $customer
 * @property State $toState
 * @property Warehouse $warehouse
 * @property SellingProduct[] $sellingProducts
 */
class Selling extends AccessoryActiveRecord
{
    public $customerName;
    public $customerPhone;
    public $warehouseName;
    public $stateName;
    public $sumPurchaseСost;
    public $sumСost;
    public $markup;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'selling';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['customer_id', 'warehouse_id', 'state_id'], 'integer'],
            [['date_create', 'date_complete'], 'safe'],
            [['dialog', 'next_step'], 'string'],
            [['name', 'selling_token'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'warehouse_id' => 'Warehouse ID',
            'state_id' => 'State ID',
            'name' => 'Name',
            'date_create' => 'Date Create',
            'date_complete' => 'Date Complete',
            'dialog' => 'Dialog',
            'next_step' => 'Next Step',
            'selling_token' => 'Selling Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['selling_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
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
    public function getSellingProducts()
    {
        return $this->hasMany(SellingProduct::className(), ['selling_id' => 'id']);
    }


    /**
     * @inheritdoc
     * @return SellingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SellingQuery(get_called_class());
    }
}
