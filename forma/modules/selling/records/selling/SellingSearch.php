<?php

namespace forma\modules\selling\records\selling;

use forma\modules\core\records\User;
use forma\modules\event\records\Event;
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'warehouse_id', 'state_id', 'customer_chief_phone'], 'integer'],
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

                    'customerName',
                    'companyName',
                    'lastEventName',
                ], 'safe'
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

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 0
            ],
            'sort' => [
                'attributes' => [
                    'customer_id',
                    'date_create',
                    'warehouse_id',
                    'state_id',
                    'name',
                    'date_createRange',
                    'date_completeRange',
                    'customer_viber',
                    'customer_telegram',
                    'customer_whatsapp',
                    'customer_skype',
                    'customer_chief_phone',
                    'customerName',
                    'customer_chief_phone' => [
                        'asc' => ['customer.chief_phone' => SORT_ASC],
                        'desc' => ['customer.chief_phone' => SORT_DESC],
                        'default' => SORT_DESC
                    ],
                    'companyName' => [
                        'asc' => ['customer.firm' => SORT_ASC],
                        'desc' => ['customer.firm' => SORT_DESC],
                        'default' => SORT_DESC
                    ],
                    'lastEventName' => [
                        'asc' => ['event.name' => SORT_ASC],
                        'desc' => ['event.name' => SORT_DESC],
                        'default' => SORT_DESC
                    ],
                ]
            ]
        ]);

        $query->select('event.name as lastEventName, selling.*');

        //SELECT * FROM event where id in(SELECT max(id) FROM `event` WHERE selling_id is not null GROUP BY selling_id) GROUP BY `selling_id`
        $groupedQuery = Event::find()
            ->select('max(id) as id')
            ->where('selling_id is not null')
            ->groupBy('selling_id');
        $eventQuery = Event::find()
            ->where(['id' => $groupedQuery]);
        $query->leftJoin(['event' => $eventQuery], 'event.selling_id = selling.id');

        $query->joinWith('customer');

        if (!($this->load($params) && $this->validate())) {
            /**
             * Жадная загрузка данных модели Страны
             * для работы сортировки.
             */
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'selling.warehouse_id' => $this->warehouse_id,
            'state_id' => $this->state_id,
        ]);

        $query->andWhere('customer.firm LIKE "%' . $this->companyName . '%"');
        $query->andWhere('customer.name LIKE "%' . $this->customerName . '%"');

        $query
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'customer.viber', $this->customer_viber])
            ->andFilterWhere(['like', 'customer.telegram', $this->customer_telegram])
            ->andFilterWhere(['like', 'customer.skype', $this->customer_skype])
            ->andFilterWhere(['like', 'customer.whatsapp', $this->customer_whatsapp])
            ->andFilterWhere(['like', 'customer.chief_phone', $this->customer_chief_phone])
        ;

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
