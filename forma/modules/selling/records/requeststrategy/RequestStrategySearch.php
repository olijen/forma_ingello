<?php

namespace forma\modules\selling\records\requeststrategy;

use forma\modules\core\records\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\selling\records\requeststrategy\RequestStrategy;

/**
 * RequestStrategySearch represents the model behind the search form of `forma\modules\selling\records\requeststrategy\RequestStrategy`.
 */
class RequestStrategySearch extends RequestStrategy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_id', 'strategy_id'], 'integer'],
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

        $query = RequestStrategy::find()->joinWith(['accessory'])
            ->andWhere(['accessory.user_id'=> \Yii::$app->user->id])
            ->andWhere(['accessory.entity_class' => RequestStrategy::className()]);

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
            'request_id' => $this->request_id,
            'strategy_id' => $this->strategy_id,
        ]);

        return $dataProvider;
    }
}
