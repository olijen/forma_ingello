<?php

namespace forma\modules\inventorization\records;

use forma\modules\warehouse\records\Warehouse;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\inventorization\records\Inventorization;

/**
 * InventorizationSearch represents the model behind the search form about `\forma\modules\inventorization\records\Inventorization`.
 */
class InventorizationSearch extends Inventorization
{
    public $date_start;
    public $date_end;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'warehouse_id', 'state'], 'integer'],
            [['name', 'date_start', 'date_end'], 'safe'],
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
        $query = Inventorization::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $warehouseArray = [];
        $warehouses = Warehouse::getList();
        //Yii::debug($warehouses);
        foreach ($warehouses as $k => $v) {
            $warehouseArray[] = $k;
        }

        $query->andWhere(['in', 'warehouse_id', $warehouseArray]);
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
            'state' => $this->state,
        ]);

        if (isset($params['date_range'])) {
            $this->date_start = date('Y-m-d', strtotime(explode(' - ', $_GET['date_range'])[0]));
            $this->date_end = date('Y-m-d', strtotime(explode(' - ', $_GET['date_range'])[1]) + 60 * 60 * 24);
        }


        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['BETWEEN', 'date', $this->date_start, $this->date_end]);

        return $dataProvider;
    }
}
