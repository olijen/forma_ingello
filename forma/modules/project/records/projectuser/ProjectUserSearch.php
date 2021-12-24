<?php

namespace forma\modules\project\records\projectuser;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\project\records\projectuser\ProjectUser;

/**
 * ProjectUserSearch represents the model behind the search form of `forma\modules\project\records\projectuser\ProjectUser`.
 */
class ProjectUserSearch extends ProjectUser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'user_id'], 'integer'],
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
        $query = ProjectUser::find();
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
            'project_id' => $this->project_id,
            'user_id' => $this->user_id,
        ]);

        return $dataProvider;
    }
}
