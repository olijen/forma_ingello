<?php

namespace forma\modules\core\records;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\modules\core\records\Regularity;

/**
 * RegularitySearch represents the model behind the search form about `forma\modules\core\records\Regularity`.
 */
class RegularitySearch extends Regularity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'order'], 'integer'],
            [['name'], 'safe'],
            [['name', 'icon'], 'string', 'max' => 55],
            [['title'], 'string', 'max' => 255],
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
        $query = Regularity::find()
            ->orderBy('order');

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
            'user_id' => Yii::$app->user->getId(),
            'order' => $this->order,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
