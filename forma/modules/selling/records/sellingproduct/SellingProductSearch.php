<?php

namespace forma\modules\selling\records\sellingproduct;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * SellingProductSearch represents the model behind the search form about `forma\modules\selling\records\sellingproduct\SellingProduct`.
 */
class SellingProductSearch extends SellingProduct
{
    public $product_category_name;
    public $product_manufacturer_name;
    public $product_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'selling_id', 'quantity', 'overhead_cost_id', 'cost_type'], 'integer'],
            [['cost'], 'number'],
            [['product_name', 'product_category_name', 'product_manufacturer_name'], 'string'],
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
     * Когда используется в продаже, используется фильтр selling_id который устанавливается в NomenclatureView->run()
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SellingProduct::find();
        $this->access($query);
        $query->joinWith(['product', 'product.category', 'product.manufacturer'], false, 'LEFT JOIN');

        $dataProvider = new ActiveDataProvider([
            'sort' => false,
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
            'product_id' => $this->product_id,
            'selling_id' => $this->selling_id,
            'quantity' => $this->quantity,
            'cost' => $this->cost,
            'overhead_cost_id' => $this->overhead_cost_id,
            'cost_type' => $this->cost_type,
        ]);

        $query->andFilterWhere(['like', 'product.name', $this->product_name])
            ->andFilterWhere(['like', 'category.name', $this->product_category_name])
            ->andFilterWhere(['like', 'manufacturer.name', $this->product_manufacturer_name]);

        return $dataProvider;
    }
}
