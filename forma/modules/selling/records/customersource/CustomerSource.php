<?php

namespace forma\modules\selling\records\customersource;
use forma\components\AccessoryActiveRecord;
use forma\modules\customer\records\Customer;

use forma\components\EntityLister;
use Yii;
use yii\helpers\ArrayHelper;


/**
* This is the model class for table "customer_source".
*
  * @property integer $id
  * @property string $name
  * @property integer $order
  * @property string $description
  *
 * @property Customer $customer;
  */
class CustomerSource extends AccessoryActiveRecord
{


  /**
  * @inheritdoc
  */
  public static function tableName()
  {
    return 'customer_source';
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
            [['name','order'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 6500]
        ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels()
  {
    return [
        'id' => 'ID',
        'name' => 'Название',
        'order' => 'Порядок',
        'description' => 'Описание',
    ];
  }
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['customer_source_id' => 'id']);
    }
    public static function getList()
    {
        return EntityLister::getList(self::className());
    }

  /**
  * @inheritdoc
  * @return CustomerSourceQuery the active query used by this AR class.
  */
  public static function find()
  {
  return new CustomerSourceQuery(get_called_class());
  }



}
