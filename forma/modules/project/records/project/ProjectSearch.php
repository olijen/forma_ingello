<?php

namespace forma\modules\project\records\project;

use forma\modules\core\records\Accessory;
use forma\modules\core\records\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\project\records\project\Project;

/**
 * ProjectSearch represents the model behind the search form of `forma\modules\project\records\project\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id', 'name', 'address', 'description', 'state'], 'safe'],
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
        $query = Project::find();
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

        $query->andFilterWhere([
            'state' => $this->state,
            'project.id' => $this->id,
        ])
        ->andFilterWhere(['like', 'name', $this->name])
        ->andFilterWhere(['like', 'address', $this->address])
        ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
