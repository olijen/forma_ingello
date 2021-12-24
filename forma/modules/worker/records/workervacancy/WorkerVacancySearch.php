<?php

namespace forma\modules\worker\records\workervacancy;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\worker\records\workervacancy\WorkerVacancy;

/**
 * WorkerVacancySearch represents the model behind the search form of `forma\modules\worker\records\workervacancy\WorkerVacancy`.
 */
class WorkerVacancySearch extends WorkerVacancy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'worker_id', 'vacancy_id'], 'integer'],
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
        $query = WorkerVacancy::find();
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
            'worker_id' => $this->worker_id,
            'vacancy_id' => $this->vacancy_id,
        ]);

        return $dataProvider;
    }
}
