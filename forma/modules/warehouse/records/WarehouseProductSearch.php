<?php

namespace forma\modules\warehouse\records;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\warehouse\records\WarehouseProduct;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * WarehouseProductSearch represents the model behind the search form about `forma\modules\warehouse\records\WarehouseProduct`.
 */
class WarehouseProductSearch extends WarehouseProduct
{
    public $product_name;
    public $product_category_name;
    public $product_manufacturer_name;
    public $product_type_id;
    public $product_sku;
    public $product_country_id;
    public $product_color_name;
    public $product_customs_code;
    public $product_proof;
    public $product_volume;
    public $warehouse_id;
    public $product_pack_unit_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'id',
                    'product_id',
                    'warehouse_id',
                    'quantity',
                    'product_type_id',
//                    'product_country_id',
//                    'product_volume',
                    'warehouse_id',
//                    'product_pack_unit_id',
                ],
                'integer',
            ],
            [
                [
                    'product_name',
                    'product_category_name',
                    'product_manufacturer_name',
                    'product_sku',
//                    'product_color_name',
//                    'product_customs_code',
                ],
                'string',
            ],
            [
                [
                    'purchase_cost',
                    'consumer_cost',
                    'recommended_cost',
                    'trade_cost',
                    'tax',
//                    'product_proof'
                ],
                'number'
            ],
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
        $query = WarehouseProduct::find()
            ->joinWith([
                'product',
                'product.category',
                'product.manufacturer',
                'product.type',
//                'product.color',
                'warehouse',
                'warehouse.warehouseUsers',
//                'product.packUnit',
            ]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => ArrayHelper::merge($dataProvider->sort->attributes, [
                'product_name' => [
                    'asc' => ['product.name' => SORT_ASC],
                    'desc' => ['product.name' => SORT_DESC],
                ],
                'product_category_name' => [
                    'asc' => ['category.name' => SORT_ASC],
                    'desc' => ['category.name' => SORT_DESC],
                ],
                'product_manufacturer_name' => [
                    'asc' => ['manufacturer.name' => SORT_ASC],
                    'desc' => ['manufacturer.name' => SORT_DESC],
                ],
                'product_type_id' => [
                    'asc' => ['type.id' => SORT_ASC],
                    'desc' => ['type.id' => SORT_DESC],
                ],
                'product_sku' => [
                    'asc' => ['product.sku' => SORT_ASC],
                    'desc' => ['product.sku' => SORT_DESC],
                ],
//                'product_country_id' => [
//                    'asc' => ['product.country_id' => SORT_ASC],
//                    'desc' => ['product.country_id' => SORT_DESC],
//                ],
//                'product_color_name' => [
//                    'asc' => ['product.color_id' => SORT_ASC],
//                    'desc' => ['product.color_id' => SORT_DESC],
//                ],
//                'product_customs_code' => [
//                    'asc' => ['product.customs_code' => SORT_ASC],
//                    'desc' => ['product.customs_code' => SORT_DESC],
//                ],
//                'product_proof' => [
//                    'asc' => ['product.proof' => SORT_ASC],
//                    'desc' => ['product.proof' => SORT_DESC],
//                ],
//                'product_volume' => [
//                    'asc' => ['product.volume' => SORT_ASC],
//                    'desc' => ['product.volume' => SORT_DESC],
//                ],
                'warehouse_id' => [
                    'asc' => ['warehouse.id' => SORT_ASC],
                    'desc' => ['warehouse.id' => SORT_DESC],
                ],
//                'product_pack_unit_id' => [
//                    'asc' => ['pack_unit.id' => SORT_ASC],
//                    'desc' => ['pack_unit.id' => SORT_DESC],
//                ],
            ]),
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
            'quantity' => $this->quantity,
            'purchase_cost' => $this->purchase_cost,
            'consumer_cost' => $this->consumer_cost,
            'recommended_cost' => $this->recommended_cost,
            'trade_cost' => $this->trade_cost,
            'tax' => $this->tax,
            'type.id' => $this->product_type_id,
//            'product.country_id' => $this->product_country_id,
//            'color.name' => $this->product_color_name,
//            'product.proof' => $this->product_proof,
//            'product.volume' => $this->product_volume,
            'warehouse.id' => $this->warehouse_id,
//            'pack_unit.id' => $this->product_pack_unit_id,
        ]);

        $query->andFilterWhere(['like', 'product.name', $this->product_name])
            ->andFilterWhere(['like', 'category.name', $this->product_category_name])
            ->andFilterWhere(['like', 'manufacturer.name', $this->product_manufacturer_name])
//            ->andFilterWhere(['like', 'product.customs_code', $this->product_customs_code])
            ->andFilterWhere(['like', 'product.sku', $this->product_sku]);

        $query->andFilterWhere(['in', 'warehouse_user.user_id', Yii::$app->user->id]);

        return $dataProvider;
    }
}
