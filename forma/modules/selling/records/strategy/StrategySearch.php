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
            [['name', 'description','is_selling'], 'safe'],
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
        $query = Strategy::find();
        $this->access($query);
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
}
