<?php

namespace forma\modules\core\records;

use Yii;

/**
 * This is the model class for table "widget_user".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $active
 * @property int $row
 * @property int $col
 * @property int $collapsed
 *
 * @property User $user
 */
class WidgetUser extends \yii\db\ActiveRecord
{

    public $widgets = [
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'widget_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'active', 'row', 'col', 'collapsed'], 'required'],
            [['user_id', 'active', 'row', 'col', 'collapsed'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'active' => 'Active',
            'row' => 'Row',
            'col' => 'Col',
            'collapsed' => 'Collapsed',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function checkUserWidgets(){
        return $this->widgets;
    }

    public function loadWidgets($data){
        $this->user_id = Yii::$app->user->id;
        $this->name = $data[0];
        $this->active = $data[1];
        $this->row = $data[2];
        $this->col = $data[3];
        $this->collapsed = $data[4];
    }

    //метод который будет считывать по каким местам распределены виджеты и записывать их в массив $this->widgets
    //далее будем их считывать в представлении и подставлять в соответсвующую панель

    public function getWidgetsInOrder(){
        $panelSmallWidget = self::find()->where(['user_id' => Yii::$app->user->id, 'active' => 0])->orderBy(['row' => SORT_ASC])->all();
        $panelBigWidget1 = self::find()->where(['user_id' => Yii::$app->user->id, 'active' => 1, 'col' => 0])->orderBy(['row' => SORT_ASC])->all();
        $panelBigWidget2 = self::find()->where(['user_id' => Yii::$app->user->id, 'active' => 1, 'col' => 1])->orderBy(['row' => SORT_ASC])->all();
        $collapsedWidget = self::find()->where(['user_id' => Yii::$app->user->id, 'active' => 1, 'collapsed' => 1])->all();

        $this->widgets['panelSmallWidget'] = $this->getWidgetsName($panelSmallWidget);
        $this->widgets['panelBigWidget1'] = $this->getWidgetsName($panelBigWidget1);
        $this->widgets['panelBigWidget2'] = $this->getWidgetsName($panelBigWidget2);
        $this->widgets['collapsedWidgets'] = $this->getWidgetsName($collapsedWidget);
    }

    private function getWidgetsName($widgets){
        $arr = [];
        for($i = 0; $i < count($widgets); $i++){
            $arr[] = $widgets[$i]->name;
        }
        return $arr;
    }

    public function getWidgetsArrayFromRequest($widgetsArray){
        $result = [];
        $i = 0;
        Yii::debug($widgetsArray);
        foreach($widgetsArray as $widgets)
            foreach($widgets as $name => $widgetValues){
                Yii::debug($name);Yii::debug($widgetValues);
                $result[$i][0] = $name;
                $result[$i][1] = $widgets[$name]['active'];
                $result[$i][2] = $widgets[$name]['row'];
                $result[$i][3] = $widgets[$name]['col'];
                $result[$i][4] = $widgets[$name]['collapsed'];
                $i++;
            }
        return $result;
    }
}
