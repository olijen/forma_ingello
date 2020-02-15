<?php

namespace forma\modules\selling\records\talk;

use forma\components\AccessoryActiveRecord;
use forma\modules\selling\records\talk\AnswerQuery;
use Yii;

/**
 * This is the model class for table "answers".
 *
 * @property int $id
 * @property string $text
 * @property int $request_id
 *
 * @property Request $requests
 */
class Answer extends AccessoryActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['request_id'], 'integer'],
            [['request_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::className(), 'targetAttribute' => ['request_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'text' => Yii::t('app', 'Ответ'),
            'request_id' => Yii::t('app', 'Вопрос'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(Request::className(), ['id' => 'request_id']);
    }

    public function getRequestText()
    {
        if ($this->request) {
            return $this->request->text;
        } else {
            return '-';
        }
    }

    /**
     * {@inheritdoc}
     * @return \forma\modules\selling\records\talk\AnswerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AnswerQuery(get_called_class());
    }



}
