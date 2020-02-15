<?php

namespace forma\modules\warehouse\records;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\warehouse\records\WarehouseUser;

/**
 * WarehouseUserSearch represents the model behind the search form about `forma\modules\warehouse\records\WarehouseUser`.
 */
class WarehouseUserSearch extends WarehouseUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'warehouse_id', 'user_id'], 'integer'],
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
        $query = WarehouseUser::find();

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
            'warehouse_id' => $this->warehouse_id,
            'user_id' => $this->user_id,
        ]);

        return $dataProvider;
    }
}
