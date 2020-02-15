<?php

namespace forma\modules\product\records;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\product\records\PackUnit;

/**
 * PackUnitSearch represents the model behind the search form about `\forma\modules\product\records\PackUnit`.
 */
class PackUnitSearch extends PackUnit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'bottles_quantity'], 'integer'],
            [['name'], 'safe'],
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
        $query = PackUnit::find()
            ->joinWith(['accessory'])
            ->andWhere(['accessory.user_id' => Yii::$app->getUser()->getIdentity()->getId()])
            ->andWhere(['accessory.entity_class' => PackUnit::className()]);

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
            'id' => $this->id,
            'bottles_quantity' => $this->bottles_quantity,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
