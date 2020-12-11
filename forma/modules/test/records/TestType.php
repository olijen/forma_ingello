<?php

namespace forma\modules\test\records;

use forma\modules\core\records\User;
use Yii;

/**
 * This is the model class for table "test_type".
 *
 * @property int $id
 * @property string $name
 * @property string|null $link
 * @property int|null $user_id
 *
 * @property TestTypeField[] $testTypeFields
 * @property Test[] $tests
 * @property User $user
 */
class TestType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['user_id'], 'integer'],
            [['name', 'link'], 'string', 'max' => 255],
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
            'name' => Yii::t('app', 'Name'),
            'link' => Yii::t('app', 'Link'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * Gets query for [[TestTypeFields]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getTestTypeFields()
    {
        return $this->hasMany(TestTypeField::className(), ['test_id' => 'id'])->inverseOf('test');
    }

    /**
     * Gets query for [[Tests]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getTests()
    {
        return $this->hasMany(Test::className(), ['test_type_id' => 'id'])->inverseOf('testType');
    }

    /**
     * Gets query for [[User]].
     *
     * y
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id'])->inverseOf('testTypes');
    }

    /**
     * {@inheritdoc}
     * @return TestTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TestTypeQuery(get_called_class());
    }
}
