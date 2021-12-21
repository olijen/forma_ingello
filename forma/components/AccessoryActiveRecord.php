<?php

namespace forma\components;

use forma\modules\core\records\User;
use forma\modules\customer\records\Customer;
use forma\modules\selling\records\selling\Selling;
use ReflectionClass;
use yii\db\ActiveRecord;
use forma\modules\core\records\Accessory;
use Yii;

class AccessoryActiveRecord extends ActiveRecord
{
    public function access($query)
    {
        $staticClass = explode('Search!!!', static::class . '!!!')[0];
        $arrayStaticClass = explode('\\', $staticClass);
        $currentClass = end($arrayStaticClass);
        $results = Accessory::find()
            ->andWhere(['accessory.user_id' => Yii::$app->user->id])
            ->andWhere(['like', 'accessory.entity_class', '%' . $currentClass, false])
            ->all();
        $accessedIds = [];
        foreach ($results as $result) {
            $accessedIds[] = $result->entity_id;
        }
        $searchClass = static::class;
        $searchClass = new $searchClass;
        $name = (new ReflectionClass($searchClass))->getShortName();
        Yii::debug($name);
        $name = explode('Search!!!', $name . '!!!')[0];
        Yii::debug($name);
        if (!empty($accessedIds)) $query->andFilterWhere(['in', strtolower($name) . '.id', $accessedIds]);
    }

    public function afterSave($insert, $changedAttributes)
    {
        if (Yii::$app->controller->action->id == 'test' && Yii::$app->user->isGuest) {
            if ($this instanceof Customer || $this instanceof Selling ){
                $this->createAccessoryToTmpUser($this->tmpUserId);
            }
        } else if (empty(Accessory::find()->where([
                'entity_class' => get_class($this),
                'entity_id' => $this->id,
                'user_id' => Yii::$app->getUser()->id,
            ])->one()) && !isset($_GET['selling_token'])) {
            $this->createAccessoryToUser();
        }
        parent::afterSave($insert, $changedAttributes);
    }

    public function getAccessory()
    {
        return $this->hasOne(Accessory::className(), ['entity_id' => 'id']);
    }

    protected function createAccessoryToUser()
    {
        $accessory = new Accessory();

        $accessory->entity_class = get_class($this);
        $accessory->entity_id = $this->id;

        $accessory->user_id = Yii::$app->getUser()
            ->getIdentity()
            ->getId();

        $accessory->save();
    }

    //используется, для сохранения продажи и клиента (Selling, Customer) когда гость проходит тест
    protected function createAccessoryToTmpUser($tmpUserId)
    {
        $accessory = new Accessory();

        $accessory->entity_class = get_class($this);
        $accessory->entity_id = $this->id;
        $accessory->user_id = $tmpUserId;

        $accessory->save();
    }

    public static function accessSearchDataProvider($default = [], $force = false)
    {
        $searchClass = static::class.'Search';
        $searchClass = new $searchClass;
        $name = (new ReflectionClass($searchClass))->getShortName();

        $dataProvider = $searchClass->search(
            (!empty($_REQUEST[$name]) && !$force)
                ? $_REQUEST
                : [$name => $default]
        );

        Yii::debug('отдаем дата провайдер');
        Yii::debug($dataProvider);

        return $dataProvider;
    }

    public static function accessSearch($default = [], $pagination = false)
    {
        $dataProvider =  self::accessSearchDataProvider($default);

        if ($pagination) {
            $dataProvider->pagination->defaultPageSize = $pagination['defaultPageSize']??null;
            $dataProvider->pagination->setPage($pagination['setPage']??null);
            $dataProvider->pagination->setPageSize($pagination['setPageSize']??null);
        } else {
            $dataProvider->pagination = false;
        }
        return $dataProvider;
    }

    public static function getAccessToOne($default = [])
    {
        Yii::debug('забираем дата провайдер');

        Yii::debug(self::accessSearchDataProvider($default));
        Yii::debug(self::accessSearchDataProvider($default)->getModels());

        if (count(self::accessSearchDataProvider($default)->getModels()) < 1) {
            return Yii::$app->controller->redirect('/hr/form?id='.$_GET['id']);
        }

        return self::accessSearchDataProvider($default)->getModels()[0];
    }

    public static function forceAccessToOne($default = [])
    {
        return self::accessSearchDataProvider($default, true)->getModels()[0];
    }

    /**
     * @param $entityClass
     * @param $user
     * @param bool $one
     * @return array|ActiveRecord|ActiveRecord[]|null
     */
    public static function getModelByUser($entityClass, $user, $one = false)
    {
        $modelAccessory = Accessory::find()
            ->where(['entity_class' => $entityClass])
            ->andWhere(['user_id' => $user->id])
            ->all();

        $modelIds = [];

        foreach ($modelAccessory as $item) {
            $modelIds[] = $item->entity_id;
        }

        if ($one)
            return self::find()
                ->where(['id' => $modelIds])
                ->limit(1)
                ->one();

        return self::find()
            ->where(['id' => $modelIds])
            ->all();
    }
}
