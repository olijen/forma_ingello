<?php

namespace forma\modules\selling\records\talk;

use forma\modules\core\records\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\selling\records\talk\Answer;

/**
 * AnswerSearch represents the model behind the search form about `forma\modules\selling\records\talk\Answer`.
 */
class AnswerSearch extends Answer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'request_id'], 'integer'],
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
        $query = Answer::find()->joinWith(['accessory'])
            ->andWhere(['accessory.user_id' => Yii::$app->user->id])
            ->andWhere(['accessory.entity_class' => Answer::className()]);
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
            'request_id' => $this->request_id,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
