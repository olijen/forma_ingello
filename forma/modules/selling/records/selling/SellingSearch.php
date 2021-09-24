<?php

namespace forma\modules\selling\records\selling;

use forma\components\DateRangeHelper;
use forma\modules\core\records\User;
use forma\modules\customer\records\Customer;
use forma\modules\event\records\Event;
use forma\modules\selling\records\state\State;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use function GuzzleHttp\Promise\all;

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
    public $event_name;

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
                    'date_next_step',
                    'event.date_form',
//                    'event_name'
                ],
                'safe'
            ],
            [['name', 'date_createRange', 'date_completeRange', 'customerName', 'companyName', 'date_next_step', 'event.date_form'], 'safe'],

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
            ],
//            'sort'=>[
//                'defaultOrder'=>[
//                    'date_next_step'=>SORT_DESC
//                ]
//            ]
        ]);

        $this->load($params);

        if (!($this->load($params) && $this->validate())) {
            /**
             * Жадная загрузка данных модели Страны
             * для работы сортировки.
             */
            $query->joinWith(['customer']);
            return $dataProvider;
        }
//        $query = Event::find()->where(['id'=>6])->orderBy(['id'=>'DESC'])->limit(1);
//        if (!($this->load($params) && $this->validate())) {
//            /**
//             * Жадная загрузка данных модели Страны
//             * для работы сортировки.
//             */
//            $query->joinWith(['event']);
//            return $dataProvider;
//        }

        // grid filtering conditions
        $query->andFilterWhere([

            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'selling.warehouse_id' => $this->warehouse_id,
            'state_id' => $this->state_id,
//            'event_id' => $this->event_id,

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
//            ->andFilterWhere(['like', 'event.name', $this->event_name]);
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


//        $query = Selling::find()->join('LEFT JOIN', 'event', 'id = event.selling_id')
//            ->where(['event.id'=> (new Query())->select(max(['event.id']))
//                ->from('event')
//                ->groupBy('event.selling_id')]);
        $eventsIds = [

            '79',
            '116',
            '93',
            '117',
            '115',
            '77',

        ];
//        ((SELECT max(id) FROM `event` GROUP BY `selling_id`))

        $query = Selling::find()->joinWith(['accessory'])
            ->joinWith(['warehouse', 'warehouse.warehouseUsers'], false, 'INNER JOIN')
            ->where(['warehouse_user.user_id' => Yii::$app->user->id])
            ->andWhere(['accessory.entity_class' => Selling::className()])
            ->andWhere(['in', 'accessory.user_id', $ids])
//            ->leftJoin('event', 'event.selling_id  = selling.id')
//            ->andWhere(['in', 'event.id', $eventsIds])

//            ->leftJoin('event', 'event.selling_id  = selling.id')
//            ->where('event.id')
//            ->onCondition(Event::find()->select('id')->groupBy('selling_id'))
//            de(1);


//            ->joinWith(['event'],true,'LEFT JOIN')
//            ->where(['selling.id' => 'event.selling_id'])
//            ->andWhere(['event.id'=> (new Query())
//                ->select(max(['event.id']))
//                    ->from('event')->groupBy('event.selling_id')]);

//            ->joinWith(['event', 'selling_id'], false,'LEFT JOIN')
//            ->where(['selling.id'=> 'event.selling_id'])
//            ->where(['event.id'=> (new Query())->select(max(['event.id']))])
//                ->from('event')
//                ->groupBy(['event.selling_id'])
//            ->orderBy(['date_create' => SORT_DESC]);
        ;
//        de($query);

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

;
//select e.id, e.name, s.id from event e join selling s on s.id = e.selling_id where e.id in (select MAX(e.id) from event e group by e.selling_id) ;
//select s.id , e.id, e.name from selling s join event e on s.id = e.selling_id where e.id in (select MAX(e.id) from event e group by e.selling_id) ;
