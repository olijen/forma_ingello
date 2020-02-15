<?php

namespace forma\modules\selling\records\selling;

use forma\modules\core\components\NomenclatureInterface;
use forma\modules\core\components\StateActiveRecord;
use forma\modules\core\components\TotalSumBehavior;
use forma\modules\warehouse\records\Warehouse;
use forma\modules\customer\records\Customer;
use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use forma\modules\selling\records\sellingproduct\SellingProduct;

use forma\modules\selling\records\selling\StateCold;
use forma\modules\selling\records\selling\StateLead;
use forma\modules\selling\records\selling\StateFamiliar;
use forma\modules\selling\records\selling\StateHot;
use forma\modules\selling\records\selling\StateMeeting;
use forma\modules\selling\records\selling\StateTestIssue;
use forma\modules\selling\records\selling\StateOffer;
use forma\modules\selling\records\selling\StatePayment;
use forma\modules\selling\records\selling\StateWork;
use forma\modules\selling\records\selling\StateDone;



/**
 * This is the model class for table "selling".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $warehouse_id
 * @property string $name
 * @property string $date_create
 * @property string $date_complete
 *
 * @property Customer $customer
 * @property Warehouse $warehouse
 * @property SellingProduct[] $sellingProducts
 * @property string next_step
 */
class Selling extends StateActiveRecord implements NomenclatureInterface
{
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
            [['customer_id', 'warehouse_id'], 'required'],
            [['customer_id', 'warehouse_id', 'state'], 'integer'],
            [['date_create', 'date_complete'], 'safe'],
            [['name'], 'string', 'max' => 100],
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
            'date_create' => 'Дата создания',
            'date_complete' => 'Дата завершения',
            'state' => 'Состояние',
        ];
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
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    public function getCustomerName()
    {
        return $this->customer->name;
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
            ->from(['selling'])
            ->one();

        $min = date('d.m.Y', strtotime($range['min']));
        $max = date('d.m.Y', strtotime($range['max']));

        return "$min - $max";
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

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'getTotalSum' => TotalSumBehavior::className(),
        ]);
    }
}
