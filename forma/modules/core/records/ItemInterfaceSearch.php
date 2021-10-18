<?php

namespace forma\modules\core\records;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\core\records\ItemInterface;

/**
 * ItemInterfaceSearch represents the model behind the search form about `forma\modules\core\records\ItemInterface`.
 */
class ItemInterfaceSearch extends ItemInterface
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_item'], 'integer'],
            [['name_item'], 'safe'],
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
        $query = ItemInterface::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_item' => $this->id_item,
        ]);

        $query->andFilterWhere(['like', 'name_item', $this->name_item]);

        return $dataProvider;
    }
}
