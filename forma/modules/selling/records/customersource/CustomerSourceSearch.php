<?php

namespace forma\modules\selling\records\customersource;

use forma\modules\core\records\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\selling\records\customersource\CustomerSource;

/**
 * CustomerSourceSearch represents the model behind the search form about `forma\modules\selling\records\customersource\CustomerSource`.
 */
class CustomerSourceSearch extends CustomerSource
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order'], 'integer'],
            [['name', 'description'], 'safe'],
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

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'order' => $this->order,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

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

        $query = CustomerSource::find()->joinWith(['accessory'])
            ->andWhere(['accessory.entity_class' => CustomerSource::className()])
            ->andWhere(['in', 'accessory.user_id', Yii::$app->user->id])//->orderBy(['date_create' => SORT_DESC])
        ;

        return $query;
    }
}
