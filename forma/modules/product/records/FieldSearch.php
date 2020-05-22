<?php

namespace forma\modules\product\records;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\product\records\Field;

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
            [['widget', 'name'], 'safe'],
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
    public function search($params, $parentCategoryId = null)
    {

        $query = Field::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

//        de($dataProvider->getModels()[0]->fieldValues);
        $this->load($params);

//        de($this->fieldAttributes);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
        ]);
        $query->orFilterWhere([
            'category_id' => $parentCategoryId,
        ]);

        $query->andFilterWhere(['like', 'widget', $this->widget])
            ->andFilterWhere(['like', 'name', $this->name]);
//        de($dataProvider->getModels());
        return $dataProvider;
    }
}
