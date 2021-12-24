<?php

namespace forma\modules\selling\records\customersource;

use forma\modules\core\records\User;
use forma\modules\selling\records\customersource\CustomerSource;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

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
        $query = CustomerSource::find();
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

        $query->andFilterWhere([
            'id' => $this->id,
            'order' => $this->order,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
