<?php

namespace forma\modules\hr\records\victim;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * VictimSearch represents the model behind the search form about `forma\modules\hr\models\Victim`.
 */
class VictimSearch extends Victim
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['fullname', 'birthday', 'is_child', 'place_of_residence', 'second_residence', 'name_where_to_settle', 'settlement_address', 'phone', 'registered_at', 'stay_for', 'questions', 'specialization', 'destination'], 'safe'],
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
        $query = Victim::find();
        $this->accessWithChild($query);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id
        ]);

        if (!empty($this->is_child)) {
            $query->andFilterWhere(['=', 'is_child', ($this->is_child == 'да') ? 1 : 0]);
        }

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'place_of_residence', $this->place_of_residence])
            ->andFilterWhere(['like', 'second_residence', $this->second_residence])
            ->andFilterWhere(['like', 'name_where_to_settle', $this->name_where_to_settle])
            ->andFilterWhere(['like', 'settlement_address', $this->settlement_address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'stay_for', $this->stay_for])
            ->andFilterWhere(['like', 'questions', $this->questions])
            ->andFilterWhere(['like', 'specialization', $this->specialization])
            ->andFilterWhere(['like', 'birthday', $this->birthday])
            ->andFilterWhere(['like', 'destination', $this->destination]);

        if (isset($params['date_range_registered_at'])) {
            $date_start = date('Y-m-d', strtotime(explode(' - ', $_GET['date_range_registered_at'])[0]));
            $date_end = date('Y-m-d', strtotime(explode(' - ', $_GET['date_range_registered_at'])[1]) + 60 * 60 * 24);
            $query->andFilterWhere(['BETWEEN', 'registered_at', $date_start, $date_end]);
        }

        $query->orderBy(['id' => SORT_DESC]);
        return $dataProvider;
    }
}
