<?php

namespace forma\modules\product\records;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use forma\modules\core\records\Accessory;
use forma\modules\core\records\User;
use forma\modules\selling\services\SellingService;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "currency".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $rate
 */
class Currency extends AccessoryActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'rate'], 'required'],
            [['rate'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 3],
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
            'code' => 'Код',
            'rate' => 'Ставка',
        ];
    }

    /**
     * @inheritdoc
     * @return CurrencyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CurrencyQuery(get_called_class());
    }

    /**
     * @param User $user
     * @param bool $one
     * @return array|Currency[]|Currency
     */
    public static function getCurrenciesByUser(User $user, $one = false)
    {
        $currencyAccessory = Accessory::find()
            ->where("entity_class like '%Currency%'")
            ->andWhere(['user_id' => $user->id])
            ->all();

        $currencyIds = [];

        foreach ($currencyAccessory as $item) {
            $currencyIds[] = $item->entity_id;
        }

        if ($one)
            return Currency::find()
            ->where(['id' => $currencyIds])
            ->limit(1)
            ->one();

        return Currency::find()
            ->where(['id' => $currencyIds])
            ->all();
    }

    /**
     * Returns array of ISO 4217 codes for drop down list.
     * 
     * @return array
     */
    public static function getList()
    {
        if (isset ($_GET['selling_token']) && Yii::$app->user->isGuest) {
            $user = SellingService::getSellingOwner();
            $currencies = self::getCurrenciesByUser($user);
            return ArrayHelper::map($currencies, 'id', 'name');
        }
//        return ArrayHelper::map(self::find()->all(), 'id', 'name');
        //todo: нужно давать доступы к стандартым валютам всем, либо добавлять валюты для каждого
        return EntityLister::getList(self::className());
    }
}
