<?php

namespace forma\modules\core\records;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use yii\web\UploadedFile;

/**
 * This is the model class for table "regularity".
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property int $order
 * @property string $picture
 *
 * @property User $user
 * @property RegularityItem[] $regularityItems
 */
class Regularity extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'regularity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'user_id', 'order'], 'required'],
            [['user_id', 'order'], 'integer'],
            [['name', 'icon'], 'string', 'max' => 55],
            [['title'], 'string', 'max' => 255],
            [['access'], 'integer', 'max' => 1],
            [['picture'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Регламент'),
            'user_id' => Yii::t('app', 'User ID'),
            'order' => Yii::t('app', 'Порядковый номер'),
            'title' => Yii::t('app', 'Описание'),
            'icon' => Yii::t('app', 'Иконка'),
            'picture' => Yii::t('app', 'Картинка'),
            'access' => Yii::t('app', 'Публичный'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id'])->inverseOf('regularities');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::className(), ['regularity_id' => 'id'])->inverseOf('regularity');
    }

    public static function getRegularitiesId($regularities)
    {
        $regularitiesId = [];
        if (!empty($regularities)) {
            foreach ($regularities as $regularity) {
                $regularitiesId [] = $regularity->id;
            }
        }

        return $regularitiesId;
    }
}
