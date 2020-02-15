<?php

namespace forma\modules\purchase\records\purchase;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PurchaseSearch represents the model behind the search form about `\forma\modules\purchase\records\Purchase`.
 */
class PurchaseSearch extends Purchase
{
    public $date_create_start;
    public $date_create_end;

    public $date_complete_start;
    public $date_complete_end;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'supplier_id', 'warehouse_id', 'state'], 'integer'],
            [['name', 'date_create_start', 'date_create_end', 'date_complete_start', 'date_complete_end'], 'safe'],
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
        $query = Purchase::find()
            ->joinWith(['warehouse', 'warehouse.warehouseUsers'], false, 'INNER JOIN')
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
            'supplier_id' => $this->supplier_id,
            'purchase.warehouse_id' => $this->warehouse_id,
            'state' => $this->state,
        ]);



        //todo: Вынести в отдельную функцию, написать версию покрасивее
        if (isset($_GET['date_create_range'])) {
            $this->date_create_start = date('Y-m-d', strtotime(explode(' - ', $_GET['date_create_range'])[0]));
            $this->date_create_end = date('Y-m-d', strtotime(explode(' - ', $_GET['date_create_range'])[1]) + 60 * 60 * 24);
        }
        if (isset($_GET['date_complete_range'])) {
            $this->date_complete_start = date('Y-m-d', strtotime(explode(' - ', $_GET['date_complete_range'])[0]));
            $this->date_complete_end = date('Y-m-d', strtotime(explode(' - ', $_GET['date_complete_range'])[1]) + 60 * 60 * 24);
        }



        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['between', 'date_create', $this->date_create_start, $this->date_create_end]);

        if ($this->date_complete) {
            $query->andFilterWhere(['between', 'date_complete', $this->date_complete_start, $this->date_complete_end]);
        }
        return $dataProvider;
    }
}
