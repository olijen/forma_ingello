<?php

namespace forma\modules\core\records;

/**
 * This is the ActiveQuery class for [[ItemInterface]].
 *
 * @see ItemInterface
 */
class ItemInterfaceQuery extends \yii\db\ActiveQuery
{
    public function getAccessoryIdS()
    {
        $accessItemInterface = Accessory::find()->where(['user_id' => \Yii::$app->user->id])
            ->andWhere(['like', 'entity_class', ['\ItemInterface']])->select('entity_id')
            ->all();
        $idS = [];
        foreach ($accessItemInterface as $key => $item) {
            $idS [] = $item->entity_id;
        }
        return $idS;
    }

    /**
     * @inheritdoc
     * @return ItemInterface[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ItemInterface|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    public function oneAccessory($db = null)
    {
        $this->andWhere(['in', 'item_interface.id', $this->getAccessoryIdS()]);
        return parent::one($db);
    }
}