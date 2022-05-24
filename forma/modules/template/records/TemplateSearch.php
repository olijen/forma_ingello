<?php

namespace forma\modules\template\records;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\template\records\Template;

/**
 * TemplateSearch represents the model behind the search form about `forma\modules\template\records\Template`.
 */
class TemplateSearch extends Template
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title',  'theme', 'user', 'content'], 'safe', ],
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
        $query = Template::find();
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

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'theme', $this->theme])
            ->andFilterWhere(['like', 'user', $this->user])
        ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
