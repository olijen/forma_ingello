<?php

namespace forma\modules\selling\records\state;

use Yii;

/**
 * This is the model class for table "state_to_state".
 *
 * @property int $id
 * @property int $state_id
 * @property int $to_state_id
 *
 * @property State $state
 * @property State $toState
 */
class StateToState extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'state_to_state';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['state_id', 'to_state_id'], 'required'],
            [['state_id', 'to_state_id'], 'integer'],
            [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['state_id' => 'id']],
            [['to_state_id'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['to_state_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'state_id' => Yii::t('app', 'State ID'),
            'to_state_id' => Yii::t('app', 'Это состояние можно поменять на:'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToState()
    {
        return $this->hasOne(State::className(), ['id' => 'to_state_id']);
    }

    public static function find()
    {
        return new StateToStateQuery(get_called_class());
    }
}
