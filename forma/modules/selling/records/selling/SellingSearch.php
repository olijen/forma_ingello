<?php

namespace forma\modules\selling\records\selling;

use forma\modules\core\records\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use forma\components\DateRangeHelper;

/**
 * SellingSearch represents the model behind the search form about `\forma\modules\selling\records\selling\Selling`.
 */
class SellingSearch extends Selling
{
    public $date_createRange;
    public $date_completeRange;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'warehouse_id', 'state_id'], 'integer'],
            [['name', 'date_createRange', 'date_completeRange'], 'safe'],
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
        $user = \Yii::$app->getUser()->getIdentity();
        $ids = []; //$ids - это массив типа [1,2,3,4,5...]
        $condition = '';

        if ($user->parent_id != null) {
            // Выбирает себя, реферера (начальника) и всех его рефералов (сотрудников)
            $condition = "parent_id = {$user->parent_id} OR id = {$user->parent_id} or id = {$user->id}";
        } else {
            // Выбирает себя (начальника, реферера) и всех рефералов.
            $condition = "parent_id = {$user->id} OR id = {$user->id}";
        }

        foreach (User::find()->where($condition)->all() as $user) {
            array_push($ids, $user->id);
        }

        $query = Selling::find()->joinWith(['accessory'])
            ->joinWith(['warehouse', 'warehouse.warehouseUsers'], false, 'INNER JOIN')
            ->where(['warehouse_user.user_id' => Yii::$app->user->id])
            ->andWhere(['in', 'accessory.user_id', $ids])
            ->andWhere(['accessory.entity_class' => Selling::className()]);

        $query->join('inner join', 'state', 'state.id = selling.state_id ')
            ->andWhere(['state.user_id' => Yii::$app->user->id]);

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
            'customer_id' => $this->customer_id,
            'selling.warehouse_id' => $this->warehouse_id,
            'state_id' => $this->state_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        foreach (['date_create', 'date_complete'] as $attribute) {
            $rangeAttribute = $attribute . 'Range';
            if (empty($this->$rangeAttribute)) {
                continue;
            }
            $query->andFilterWhere(DateRangeHelper::getDateRangeCondition($attribute, $this->$rangeAttribute));
        }

        return $dataProvider;
    }
}
