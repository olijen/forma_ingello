<?php

namespace forma\modules\core\records;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\core\records\Rule;

/**
 * RuleSearch represents the model behind the search form about `forma\modules\core\records\Rule`.
 */
class RuleSearch extends Rule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'mark', 'item_id'], 'integer'],
            [['action', 'model'], 'safe'],
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
        $query = Rule::find();

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
            'mark' => $this->mark,
            'item_id' => $this->item_id,
        ]);

        $query->andFilterWhere(['like', 'action', $this->action])
            ->andFilterWhere(['like', 'model', $this->model]);

        return $dataProvider;
    }
}
