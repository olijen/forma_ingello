<?php

namespace forma\modules\hr\records\victim;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\hr\records\victim\Victim;

/**
 * VictimSearch represents the model behind the search form of `forma\modules\worker\records\Victim`.
 */
class VictimSearch extends Victim
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['is_child'], 'boolean'],
            [['fullname', 'birthday', 'registered_at', 'phone'], 'safe'],
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
        $query = Victim::find();
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

        // grid filtering conditions
        $query->andFilterWhere([
            'victim.id' => $this->id,
            'birthday' => $this->birthday,
            'registered_at' => $this->registered_at,
            'is_child' => $this->is_child,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
