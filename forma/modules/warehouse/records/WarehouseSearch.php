<?php

namespace forma\modules\warehouse\records;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\warehouse\records\Warehouse;

/**
 * WarehouseSearch represents the model behind the search form about `\forma\modules\warehouse\records\Warehouse`.
 */
class WarehouseSearch extends Warehouse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id'], 'integer'],
            [['name', 'address'], 'safe'],
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
        $query = Warehouse::find()
            ->joinWith(['warehouseUsers'])
            ->where(['warehouse_user.user_id' => Yii::$app->user->id]);

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
            'country_id' => $this->country_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }

    public function getWarehouseListHeader(){
        return  Yii::$app->cache->getOrSet('warehouses'.Yii::$app->user->id, function () {
            return  Warehouse::find()
                ->joinWith(['warehouseUsers'])
                ->joinWith(['warehouseProducts'])
                ->where(['warehouse_user.user_id' => Yii::$app->user->id])->all();
        });
    }
}
