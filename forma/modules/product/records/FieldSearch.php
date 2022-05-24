<?php

namespace forma\modules\product\records;

use forma\modules\product\components\SystemWidget;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\product\records\Field;
use yii\helpers\ArrayHelper;

/**
 * FieldSearch represents the model behind the search form of `forma\modules\product\records\Field`.
 */
class FieldSearch extends Field
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id'], 'integer'],
            [['widget', 'name', 'defaulted'], 'safe'],
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
    public function search($params, $parentsCategoriesId = null)
    {
        $query = Field::find();
        $this->access($query);

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

        if (!empty($parentsCategoriesId)) {
            $this->category_id = $parentsCategoriesId;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'widget', $this->widget])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
