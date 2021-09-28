<?php

namespace forma\modules\selling\records\selling;

use forma\components\DateRangeHelper;
use forma\modules\core\records\User;
use forma\modules\customer\records\Customer;
use forma\modules\selling\records\state\State;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SellingSearch represents the model behind the search form about `\forma\modules\selling\records\selling\Selling`.
 */
class SellingSearch extends Selling
{
    public $date_createRange;
    public $date_completeRange;

    public $customer_viber;
    public $customer_telegram;
    public $customer_whatsapp;
    public $customer_skype;
    public $customer_chief_phone;
    public $customerName;
    public $companyName;
    public $date_next_step;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'warehouse_id', 'state_id'], 'integer'],

            [
                [
                    'name',
                    'date_createRange',
                    'date_completeRange',
                    'customer_viber',
                    'customer_telegram',
                    'customer_whatsapp',
                    'customer_skype',
                    'customer_chief_phone',
                    'date_next_step'
                ],
                'safe'
            ],
            [['name', 'date_createRange', 'date_completeRange', 'customerName', 'companyName', 'date_next_step'], 'safe'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        $query = $this->getStartQuery();

//        $query->join('join', 'state', 'state.id = selling.state_id ')
//            ->andWhere(['state.user_id' => Yii::$app->user->id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 0
            ]
        ]);
        $dataProvider->sort->attributes['date_next_step'] = [
            'asc' => ['selling.date_next_step' => SORT_ASC],
            'desc' => ['selling.date_next_step' => SORT_DESC],
        ];
        $this->load($params);

        if (!($this->load($params) && $this->validate())) {
            /**
             * Жадная загрузка данных модели Страны
             * для работы сортировки.
             */
            $query->joinWith(['customer']);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([

            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'selling.warehouse_id' => $this->warehouse_id,
            'state_id' => $this->state_id,

        ]);
        $query->joinWith(['customer' => function ($q) {
            $q->where('customer.name LIKE "%' . $this->customerName . '%"');
        }]);
        $query->andWhere('customer.firm LIKE "%' . $this->companyName . '%"');
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'customer.viber', $this->customer_viber])
            ->andFilterWhere(['like', 'customer.telegram', $this->customer_telegram])
            ->andFilterWhere(['like', 'customer.skype', $this->customer_skype])
            ->andFilterWhere(['like', 'customer.whatsapp', $this->customer_whatsapp])
            ->andFilterWhere(['like', 'customer.chief_phone', $this->customer_chief_phone])
            ->andFilterWhere(['like', 'selling.date_next_step', $this->date_next_step]);
        return $dataProvider;
    }

    public function getStartQuery()
    {
        $user = \Yii::$app->getUser()->getIdentity();
        $ids = []; //$ids - это массив типа [1,2,3,4,5...]
        $condition = '';

        if ($user->parent_id != null) {
            // Выбирает себя, реферера (начальника) и всех его рефералов (сотрудников)
            $condition = "parent_id = {$user->parent_id} OR id = {$user->parent_id} or id = {$user->id}";
        } else {
            // Выбирает себя (начальника, реферера) и всех рефералов.
            $condition = "parent_id = {$user->id} OR id = {$user->id}";
        }

        $users = Yii::$app->cache->getOrSet($condition, function () use ($condition) {
            return User::find()->where($condition)->all();
        });
        foreach ($users as $user) {
            array_push($ids, $user->id);
        }

        $query = Selling::find()->joinWith(['accessory'])
            ->joinWith(['warehouse', 'warehouse.warehouseUsers'], false, 'LEFT JOIN')
            ->where(['warehouse_user.user_id' => Yii::$app->user->id])
            ->orWhere(['warehouse_user.user_id' => null])
            ->andWhere(['accessory.entity_class' => Selling::className()])
            ->andWhere(['in', 'accessory.user_id', $ids])//->orderBy(['date_create' => SORT_DESC])
        ;


        return $query;
    }

    public function searchLastClients()
    {
        $query = $this->getStartQuery();
        return $query->orderBy(['id' => SORT_DESC])->limit(5)->all();
    }


    //todo: добавить селект на поля как минимум date_complete, id
    public function weeklySales()
    {
        $query = $this->getStartQuery();
        $order_id = State::find()->select(['id'])->where(['user_id' => Yii::$app->user->id])->orderBy(['order' => SORT_DESC])->limit(1)->all();
        if (!empty($order_id)) return $query = $query->andWhere(['state_id' => $order_id[0]->id])->all();
    }

    public function salesInWarehouse()
    {
        $query = $this->getStartQuery();
        $query->select(['selling.warehouse_id', 'COUNT(*) as sale_warehouse'])->groupBy('selling.warehouse_id');
        return $query->all();
    }
}
