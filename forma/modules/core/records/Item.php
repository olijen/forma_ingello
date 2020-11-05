<?php

namespace forma\modules\core\records;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $parent_id
 * @property int $regularity_id
 * @property int $order
 * @property string $color
 * @property string $picture
 *
 * @property Regularity $regularity
 * @property Item $parent
 * @property Item[] $items
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'regularity_id', 'order'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['color'], 'string', 'max' => 55],
            [['picture'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['access'], 'integer', 'max' => 1],
            [['regularity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regularity::className(), 'targetAttribute' => ['regularity_id' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Заголовок'),
            'description' => Yii::t('app', 'Описание'),
            'parent_id' => Yii::t('app', 'Дополнительный вопрос'),
            'regularity_id' => Yii::t('app', 'Регламент вопроса'),
            'order' => Yii::t('app', 'Порядковый номер'),
            'color' => Yii::t('app', 'Цвет'),
            'picture' => Yii::t('app', 'Картинка'),
            'access' => Yii::t('app', 'Публичный'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegularity()
    {
        return $this->hasOne(Regularity::className(), ['id' => 'regularity_id'])->inverseOf('items');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Item::className(), ['id' => 'parent_id'])->inverseOf('items');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['parent_id' => 'id'])->inverseOf('parent');
    }

    public static function getSubItems($items)
    {
        $subItems = [];
        if (!empty($items)) {
            foreach ($items as $item) {
                if (!is_null($item->parent_id)) {
                    $subItems [] = $item;
                }
            }
        }
        return $subItems;
    }

    public static function getMainItems($allItems)
    {
        $items = [];
        if (!empty($allItems)) {
            foreach ($allItems as $item) {
                if (is_null($item->parent_id)) {
                    $items [] = $item;
                }
            }
        }
        return $items;
    }

}
