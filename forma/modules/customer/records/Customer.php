<?php

namespace forma\modules\customer\records;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use forma\modules\core\records\Accessory;
use forma\modules\core\records\User;
use forma\modules\selling\records\selling\Selling;
use Yii;
use yii\helpers\ArrayHelper;
use forma\modules\country\records\Country;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $name
 * @property string $firm
 * @property integer $country_id
 * @property string $address
 * @property string $company_email
 * @property string $chief_email
 * @property double $tax_rate
 * @property string $company_phone
 * @property string $chief_phone
 * @property string $site_company
 * @property string $description
 * @property integer $is_company
 *
 * @property Country $country
 */
class Customer extends AccessoryActiveRecord
{
    //для того чтобы не accessory active record не создавал соотнешение к юзеру
    public $selling_token;

    public $tmpUserId;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['tax_rate'], 'number'],
            [['name', 'firm'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 150],
            [[ 'company_email', 'chief_email', 'site_company'], 'string', 'max' => 255],
            [['company_phone', 'chief_phone'], 'string', 'max' => 32],
            [['description'], 'string'],
            [['country_id', 'is_company'], 'integer'],
            [['chief_email'], 'email'],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя клиента',
            'firm' => 'Компания',
            'country_id' => 'Страна',
            'address' => 'Адрес',
            'company_email' => 'Почта компании',
            'chief_phone' => 'Телефонный номер клиента',
            'company_phone' => 'Телефонный номер компании',
            'chief_email' =>  'Почта клиента',
            'site_company' => 'Сайт компании',
            'tax_rate' => 'Процентая ставка',
            'description' => 'Описание клиента',
            'is_company' => 'Представитель компании',
        ];
    }

    /**
     * @inheritdoc
     * @return CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CustomerQuery(get_called_class());
    }

    public static function getList()
    {
        return EntityLister::getList(self::className());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    public function getSellings()
    {
        return $this->hasMany(Selling::className(), ['customer_id' => 'id']);
    }

    public static function sendMessage( array $data)
    {
        $list = [];

        foreach (Customer::findAll($data['selection'])  as $user) {
            $list[] = Yii::$app->mailer->compose()
                ->setFrom('from@domain.com')
                ->setTo($user->chief_email)
                ->setSubject('Ув.'.' '.$user->name.' '.$data['messageSubject'])
                ->setTextBody($data['message']);
        }

        Yii::$app->mailer->sendMultiple($list);

        return true;
    }

    public static function getCustomersByUser(User $user, $one = false)
    {
        $customerAccessory = Accessory::find()
            ->where(['entity_class' => 'forma\modules\customer\records\Customer'])
            ->andWhere(['user_id' => $user->id])
            ->all();

        $customerIds = [];

        foreach ($customerAccessory as $item) {
            $customerIds[] = $item->entity_id;
        }

        if ($one)
            return self::find()
                ->where(['id' => $customerIds])
                ->limit(1)
                ->one();

        return self::find()
            ->where(['id' => $customerIds])
            ->all();
    }
    
}
