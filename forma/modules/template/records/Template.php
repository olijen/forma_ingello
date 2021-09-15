<?php

namespace forma\modules\template\records;

use Yii;

/**
 * This is the model class for table "template".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $Content
 * @property string|null $Theme
 */
class Template extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'template';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'Content', 'Theme'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'Content' => 'Content',
            'Theme' => 'Theme',
        ];
    }
}
