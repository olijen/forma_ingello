<?php

namespace forma\modules\core\records;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\core\records\Item;

/**
 * ItemSearch represents the model behind the search form of `forma\modules\core\records\Item`.
 */
class ItemSearch extends Item
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'regularity_id', 'order'], 'integer'],
            [['title', 'description', 'color'], 'safe'],
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
        $query = Item::find();

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
            'parent_id' => $this->parent_id,
            'regularity_id' => $this->regularity_id,
            'order' => $this->order,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'color', $this->color]);

        return $dataProvider;
    }
}
