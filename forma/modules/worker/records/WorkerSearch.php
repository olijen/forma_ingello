<?php

namespace forma\modules\worker\records;

use forma\modules\core\records\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\worker\records\Worker;

/**
 * WorkerSearch represents the model behind the search form of `forma\modules\worker\records\Worker`.
 */
class WorkerSearch extends Worker
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'gender', 'experience'], 'integer'],
            [['name', 'surname', 'patronymic', 'date_birth', 'passport', 'apply_position', 'experience_description'], 'safe'],
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
        $query = Worker::find();
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
            'worker.id' => $this->id,
            'status' => $this->status,
            'date_birth' => $this->date_birth,
            'gender' => $this->gender,
            'experience' => $this->experience,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'passport', $this->passport])
            ->andFilterWhere(['like', 'apply_position', $this->apply_position])
            ->andFilterWhere(['like', 'experience_description', $this->experience_description]);

        return $dataProvider;
    }
}
