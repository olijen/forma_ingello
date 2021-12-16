<?php

namespace forma\modules\selling\records\selling;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use forma\modules\core\components\NomenclatureInterface;
use forma\modules\core\components\TotalSumBehavior;
use forma\modules\customer\records\Customer;
use forma\modules\event\records\Event;
use forma\modules\selling\records\sellingproduct\SellingProduct;
use forma\modules\selling\records\state\State;
use forma\modules\warehouse\records\Warehouse;
use yii\db\Query;


/**
 * This is the model class for table "selling".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $warehouse_id
 * @property string $name
 * @property string $comment
 * @property string $date_create
 * @property string $date_complete
 * @property integer $state_id
 * @property Customer $customer
 * @property Warehouse $warehouse
 * @property SellingProduct[] $sellingProducts
 * @property string $selling_token
 * @property string $lastEvent
 * @property integer $sale_warehouse
 */
class Selling extends AccessoryActiveRecord implements NomenclatureInterface
{

    public $lastEventName;

    public $lastEventDate;

    public $sale_warehouse;
    public $customerName;
    public $customerPhone;
    public $warehouseName;
    public $stateName;
    public $sumPurchaseСost;
    public $sumСost;
    public $markup;

    public $tmpUserId = null;

    //Это временная заглушка, для того что бы работали элементы с StateActiveRecord
    public function stateIs($state)
    {
        return false;
    }

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
    public function states()
    {
        return [
            StateCold::class,
            StateLead::class,
            StateFamiliar::class,
            StateHot::class,
            StateMeeting::class,
            StateTestIssue::class,
            StateOffer::class,
            StatePayment::class,
            StateWork::class,
            StateDone::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public function getUnits()
    {
        return $this->sellingProducts;
    }

    /**
     * @inheritdoc
     */
    public function getRelatedWarehouse()
    {
        return $this->warehouse;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['customer_id', 'warehouse_id'], 'integer'],
            [['date_create', 'date_complete', 'lastEvent'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['comment'], 'string'],
            [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['state_id' => 'id']],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['warehouse_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Клиент',
            'warehouse_id' => 'Место',
            'name' => 'Название',
            'comment' => 'Комментарий',
            'date_create' => 'Дата создания',
            'date_complete' => 'Дата завершения',
            'state_id' => 'Состояние',
            'selling_token' => 'Токен',

        ];
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        return parent::save($runValidation, $attributeNames); // TODO: Change the autogenerated stub
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

    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['selling_id' => 'id']);
    }

    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['selling_id' => 'id']);
    }

    public function getToState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }

    /**
     * @inheritdoc
     * @return SellingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SellingQuery(get_called_class());
    }

    public static function getList()
    {
        return EntityLister::getList(self::className());
    }

    public function getCustomerName()
    {
        return $this->customer->name;
    }

    public function getWarehouseName()
    {
        return $this->warehouse->name;
    }

    public function getSellingToken()
    {
        return $this->selling_token;
    }

    //todo: вынести общее из двух методов
    public static function getDateCreateRange()
    {
        $range = (new Query())
            ->select(['MIN(date_create) AS min', 'MAX(date_create) AS max'])
            ->from(['selling'])
            ->one();

        $min = date('d.m.Y', strtotime($range['min']));
        $max = date('d.m.Y', strtotime($range['max']));

        return "$min - $max";
    }

    public static function getSellingBySellingToken($sellingToken)
    {
        return self::find()
            ->where(['selling_token' => $sellingToken])
            ->limit(1)
            ->one();
    }

    public static function getDateCompleteRange()
    {
        $range = (new Query())
            ->select(['MIN(date_complete) AS min', 'MAX(date_complete) AS max'])
            ->from(['selling'])
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

    public function afterFind()
    {
        // convert the date back to mm/dd/yyyy format while viewing
        $this->date_create = date('m.d.Y H:i', strtotime($this->date_create));
        if ($this->lastEventDate !== null) {
            $this->lastEventDate = date('m.d.Y H:i', strtotime($this->lastEventDate));
        }
        parent::afterFind();
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'getTotalSum' => TotalSumBehavior::className(),
        ]);
    }

    public function findStateById($id)
    {

    }

    public function getSellingInWeek()
    {

    }
}
