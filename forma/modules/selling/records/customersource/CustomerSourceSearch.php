<?php

namespace forma\modules\selling\records\customersource;

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
            [['id'], 'integer'],
            [['title',  'theme', 'user', 'content'], 'safe', ],
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
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'theme', $this->theme])
            ->andFilterWhere(['like', 'user', $this->user])
        ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
