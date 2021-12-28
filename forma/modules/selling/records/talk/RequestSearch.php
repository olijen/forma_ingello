<?php

namespace forma\modules\selling\records\talk;

use forma\modules\core\records\User;
use forma\modules\selling\records\talk\Request;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RequestSearch represents the model behind the search form about `forma\modules\selling\records\talk\Request`.
 */
class RequestSearch extends Request
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['text'], 'safe'],
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
        $query = Request::find();
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
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }

}
