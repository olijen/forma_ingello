<?php

namespace forma\modules\template\records;

use Yii;

/**
 * This is the model class for table "template".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $content
 * @property string|null $theme
 * @property string|null $user
 */
class Template extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        if ($this->content) {
            $this->content = strip_tags($this->content);
        }
        return parent::beforeSave($insert);
    }
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
            ['theme', 'string','length'=>[3,50] ],
            ['title', 'string','length'=>[3,15] ],
            ['user', 'email'],
            [['content'], 'string'],
            [['title', 'content', 'theme', 'user', ], 'required', ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'theme' => 'Тема',
            'user' => 'От кого',
            'content' => 'Содержание',
        ];
    }
}
