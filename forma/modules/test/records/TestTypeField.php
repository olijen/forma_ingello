<?php

namespace app\modules\test\records;

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
            [['required'], 'integer'],
            [['block_name', 'label_name', 'type', 'value', 'placeholder',''], 'string', 'max' => 255],
            [['test_id'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'block_name' => 'Block Name',
            'label_name' => 'Label Name',
            'type' => 'Type',
            'value' => 'Value',
            'placeholder' => 'Placeholder',
            'required' => 'Required',
        ];
    }
}
