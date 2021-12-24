<?php

namespace forma\modules\project\records\projectvacancy;

use forma\modules\core\records\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\project\records\projectvacancy\ProjectVacancy;

/**
 * ProjectVacancySearch represents the model behind the search form of `forma\modules\project\records\projectvacancy\ProjectVacancy`.
 */
class ProjectVacancySearch extends ProjectVacancy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'vacancy_id', 'count'], 'integer'],
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
        $query = ProjectVacancy::find();
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
            'project_vacancy.id' => $this->id,
            'project_id' => $this->project_id,
            'vacancy_id' => $this->vacancy_id,
            'count' => $this->count,
        ]);

        return $dataProvider;
    }
}
