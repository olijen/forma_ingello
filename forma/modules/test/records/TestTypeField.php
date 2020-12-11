<?php

namespace forma\modules\test\records;

use forma\modules\test\records\TestType;
use Yii;

/**
 * This is the model class for table "test_type_field".
 *
 * @property int $id
 * @property string $block_name
 * @property string $label_name
 * @property string|null $type
 * @property string|null $value
 * @property string|null $placeholder
 * @property int|null $required
 * @property int|null $test_id
 *
 * @property TestType $test
 */
class TestTypeField extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_type_field';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['block_name', 'label_name'], 'required'],
            [['required', 'test_id'], 'integer'],
            [['block_name', 'label_name', 'type', 'value', 'placeholder'], 'string', 'max' => 255],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => TestType::className(), 'targetAttribute' => ['test_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'block_name' => Yii::t('app', 'Block Name'),
            'label_name' => Yii::t('app', 'Label Name'),
            'type' => Yii::t('app', 'Type'),
            'value' => Yii::t('app', 'Value'),
            'placeholder' => Yii::t('app', 'Placeholder'),
            'required' => Yii::t('app', 'Required'),
            'test_id' => Yii::t('app', 'Test ID'),
        ];
    }

    /**
     * Gets query for [[Test]].
     *
     * @return \yii\db\ActiveQuery|TestTypeQuery
     */
    public function getTest()
    {
        return $this->hasOne(TestType::className(), ['id' => 'test_id'])->inverseOf('testTypeFields');
    }

    /**
     * {@inheritdoc}
     * @return TestTypeFieldQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TestTypeFieldQuery(get_called_class());
    }
}
