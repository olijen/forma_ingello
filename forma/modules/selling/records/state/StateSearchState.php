<?php

namespace forma\modules\selling\records\state;

use phpseclib\System\SSH\Agent\Identity;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\selling\records\state\StateToState;

/**
 * StateSearchState represents the model behind the search form of `forma\modules\selling\records\state\StateToState`.
 */
class StateSearchState extends StateToState
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        return [
            [['id', 'state_id', 'to_state_id'], 'integer'],

            ['to_state_id', 'unique', 'when' => function ($model) {
                if (StateToState::find()
                    ->where(['to_state_id' => $model->to_state_id])
                    ->andWhere(['state_id' => $model->state_id])->one()){
                    $this->addError('to_state_id', 'Такое уже есть');
                }

            }],
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
    public function search($params, $state_id = [])
    {

        $query = StateToState::find();
//        ->join('inner join', 'state','state.id = state_to_state.to_state_id ');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
//
//        de($dataProvider->getModels()[0]->toState);
        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'state_id' => $state_id,
            'to_state_id' => $this->to_state_id,
        ]);

        return $dataProvider;
    }
}
