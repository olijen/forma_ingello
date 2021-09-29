<?php

namespace forma\modules\hr\records\interviewstate;

use forma\components\AccessoryActiveRecord;
use forma\components\EntityLister;
use forma\modules\hr\records\interview\Interview;
use Yii;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/**
* This is the model class for table "interview_state".
*
  * @property integer $id
  * @property string $name
  * @property integer $user_id
  * @property integer $order
  * @property string $description
*/
class InterviewState extends AccessoryActiveRecord
{


  /**
  * @inheritdoc
  */
    public static function tableName()
    {
        return 'interview_state';
    }

  /**
  * @inheritdoc
  */
    public function behaviors()
    {
        return [
          ];
    }

  /**
  * @inheritdoc
  */
    public function rules()
    {
        return [
                [['name', 'order'], 'required'],
                [['user_id', 'order'], 'integer'],
                [['description'], 'string'],
                [['name'], 'string', 'max' => 255],

        ];
    }

  /**
  * @inheritdoc
  */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Состояние'),
            'order' => Yii::t('app','Порядок'),
            'description' => Yii::t('app','Описание'),
        ];
    }

    public function getInterviews()
    {
        return $this->hasMany(Interview::className(), ['state_id' => 'id']);
    }
  /**
  * @inheritdoc
  * @return InterviewStateQuery the active query used by this AR class.
  */
    public static function find()
    {
        return new InterviewStateQuery(get_called_class());
    }
    public static function getList($byUser = null)
    {
        return EntityLister::getList(self::className(), $byUser);
    }
    private static function getContents($project_id, $vacancy_id)
    {
        $interviewStates = InterviewState::find()->where(['user_id' => Yii::$app->user->id])->all();
        $interviews = [];
        foreach ($interviewStates as $interviewState) {
            $interviews[] = $interviewState->getInterviews()->andWhere(['project_id' => $project_id, 'vacancy_id' => $vacancy_id])->all();
        }
        $interviewStateWorkers = [];
        foreach ($interviewStates as $interviewState) {
            foreach ($interviews as $interview) {
                foreach ($interview as $item) {
                    if ($interviewState->id !== $item->state_id) {
                        $interviewStateWorkers[$interviewState->id] = [];
                    }
                    if ($interviewState->id == $item->state_id) {
                        $interviewStateWorkers[$interviewState->id][] = $item->worker;
                    }
                }
            }
       }
        return $interviewStateWorkers;
    }
    public static function getItems($project_id, $vacancy_id)
    {
        $items = [];
        $interviewStateIdNames = [];
        $workers = self::getContents($project_id, $vacancy_id);
        $interviewStates = InterviewState::find()->where(['user_id' => Yii::$app->user->id])->all();
        foreach ($interviewStates as $interviewState) {
            $interviewStateIdNames[$interviewState->id] = $interviewState->name;
        }
        foreach ($workers as $key => $value) {
            $arrayDataProvider = new ArrayDataProvider(
                [
                    'allModels' => $value,
                ]
            );
                if (!empty($value)) {
                    $items[] = [
                        'label' => "<i class=\"btn btn-primary\">$interviewStateIdNames[$key]</i>",
                        'content' => GridView::widget(
                            [
                                'dataProvider' => $arrayDataProvider,
                                'columns' => [
                                    'name',
                                    'surname',
                                    [
                                        'attribute' => 'historyDialog',
                                        'format' => 'raw',
                                        'value' => function ($data) {
                                            if (!empty($data->historyDialog)) {
                                                return '<div style="overflow: scroll; width: 100%; height: 300px">' . $data->historyDialog . '</div>';
                                            }
                                        },
                                    ],
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'template' => '{update}',
                                        'urlCreator' => function ($action, $data, $key, $index) {
                                            return Url::to(['/hr/form', 'id' => $data->getInterviews()->one()->id]);
                                        }
                                    ],
                                ]
                            ]
                        ),
                        'active' => true,
                    ];
            }
            if (empty($value)) {
                $items[] = [
                    'label' => "<i class=\"btn btn-primary\">$interviewStateIdNames[$key]</i>",
                    'content' => 'Нет никого на данном этапе',
                    'active' => false
                ];
            }
        }
        return $items;
    }
}
