<?php

namespace forma\modules\test\records;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\test\records\Test;

/**
 * TestResultSearch represents the model behind the search form of `forma\modules\test\records\Test`.
 */
class TestResultSearch extends Test
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'test_type_id', 'customer_id'], 'integer'],
            [['result'], 'safe'],
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
        $query = Test::find();

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
            'test_type_id' => $this->test_type_id,
            'customer_id' => $this->customer_id,
        ]);

        $query->andFilterWhere(['like', 'result', $this->result]);

        return $dataProvider;
    }
}
