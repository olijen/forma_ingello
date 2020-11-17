<?php

namespace forma\modules\selling\records\strategy;

use forma\modules\core\records\User;
use forma\modules\selling\records\strategy\Strategy;
use GuzzleHttp\Tests\Psr7\Str;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * StrategySearch represents the model behind the search form of `forma\modules\selling\records\strategy\Strategy`.
 */
class StrategySearch extends Strategy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'description'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = $this->createQuery();


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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }

    public function createQuery () {
        $user = \Yii::$app->getUser()->getIdentity();
        $ids = []; //$ids - это массив типа [1,2,3,4,5...]
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

        $query = Strategy::find()->joinWith(['accessory'])
            ->andWhere(['in', 'accessory.user_id', $ids])
            ->andWhere(['accessory.entity_class' => Strategy::className()]);

        return $query;
    }
}
