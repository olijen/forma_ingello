<?php

namespace forma\modules\customer\records;

use forma\modules\core\records\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\customer\records\Customer;

/**
 * CustomerSearch represents the model behind the search form about `forma\modules\customer\records\Customer`.
 */
class CustomerSearch extends Customer
{
    public $customer_source;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id','customer_source_id'], 'integer'],
            [
                [
                    'name',
                    'firm',
                    'address',
                    'company_email',
                    'chief_phone',
                    'state',
                    'telegram',
                    'skype',
                    'whatsapp',
                    'viber',
                    'customer_source',
                    'customer_source_id',
                ],
                'safe'
            ],
            [['tax_rate'], 'number'],
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
        $user = \Yii::$app->getUser()->getIdentity();
        $ids = [$user->id]; //$ids - это массив типа [1,2,3,4,5...]
        $condition = '';

        if ($user->parent_id != null) {
        // Выбирает себя, реферера (начальника) и всех его рефералов (сотрудников)
            $condition = "parent_id = {$user->parent_id} OR id = {$user->parent_id} OR id = {$user->id}";
        } else {
        // Выбирает себя (начальника, реферера) и всех рефералов.
            $condition = "parent_id = {$user->id} OR id = {$user->id}";
        }

        foreach (User::find()->where($condition)->all() as $user) {
            array_push($ids, $user->id);
        }

        $query = Customer::find()->joinWith(['accessory'])
            ->andWhere(['in', 'accessory.user_id', $ids])
            ->andWhere(['accessory.entity_class' => Customer::className()]);

    // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tax_rate' => $this->tax_rate,
            'country_id' => $this->country_id,
            'chief_phone' => $this->chief_phone,
        ]);


        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'firm', $this->firm])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'company_email', $this->company_email])
            ->andFilterWhere(['like', 'telegram', $this->telegram])
            ->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['like', 'whatsapp', $this->whatsapp])
            ->andFilterWhere(['like', 'viber', $this->viber])
            ->andFilterWhere(['like', 'customer_source_id', $this->customer_source_id])
        ;

        return $dataProvider;
    }
}
