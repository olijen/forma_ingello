<?php

namespace forma\modules\test\records;

use forma\modules\test\records\TestTypeField;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * TestTypeFieldSearch represents the model behind the search form of `forma\modules\test\records\TestTypeField`.
 */
class TestTypeFieldSearch extends TestTypeField
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'required'], 'integer'],
            [['block_name', 'label_name', 'type', 'value', 'placeholder','test_id'], 'safe'],
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

            $id = $params['id'];

            $query = TestTypeField::find();
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
                'test_id' => $this->id,

            ]);

            $query
                ->andWhere(['test_id' => (int)$id])
                ->andFilterWhere(['like', 'block_name', $this->block_name])
                ->andFilterWhere(['like', 'label_name', $this->label_name])
                ->andFilterWhere(['like', 'id', $this->id])
                ->andFilterWhere(['like', 'test_id', $this->test_id])
                ->andFilterWhere(['like', 'type', $this->type])
                ->andFilterWhere(['like', 'value', $this->value])
                ->andFilterWhere(['like', 'placeholder', $this->placeholder]);

            return $dataProvider;
        }
    }

