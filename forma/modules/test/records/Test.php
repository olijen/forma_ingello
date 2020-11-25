<?php

namespace app\modules\test\records;
use forma\modules\customer\records\Customer;
use forma\modules\test\records\TestType;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property string $client_name
 * @property string|null $result
 * @property int|null $test_type_id
 * @property int|null $customer_id
 *
 * @property Customer $customer
 * @property TestType $testType
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_name'], 'required'],
            [['result'], 'string'],
            [['test_type_id', 'customer_id'], 'integer'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['test_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TestType::className(), 'targetAttribute' => ['test_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_name' => 'Client Name',
            'result' => 'Result',
            'test_type_id' => 'Test Type ID',
            'customer_id' => 'Customer ID',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * Gets query for [[TestType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTestType()
    {
        return $this->hasOne(TestType::className(), ['id' => 'test_type_id']);
    }
}
