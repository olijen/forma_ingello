<?php

namespace forma\modules\core\controllers;

use Yii;
use forma\modules\core\records\Rule;
use forma\modules\core\records\RuleSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use forma\modules\core\records\Regularity;
use forma\modules\core\records\Item;

/**
 * RuleController implements the CRUD actions for Rule model.
 */
class RuleController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Rule models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RuleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $tables[''] ='';
        foreach (Yii::$app->db->schema->tableNames as $table){
            $tables[$table] = $table;
        };
        $items = ArrayHelper::map(Regularity::find()->joinWith('items')
            ->select(['regularity.name', 'item.title', 'item.id'])->where(['user_id' => Yii::$app->user->id])->asArray()
            ->all(), 'title', 'title', 'name');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tables'=>$tables,
            'items'=>$items,
        ]);
    }

    /**
     * Displays a single Rule model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $rule =$this->findModel($id);
        $item = Item::find()->where(['id'=>$rule->item->id])->one();
        return $this->render('view', [
            'model' => $rule,
            'item' =>$item,
        ]);
    }

    /**
     * Creates a new Rule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rule();
        $model->loadDefaultValues(); //load default data from db
        $tables[''] ='';
        foreach (Yii::$app->db->schema->tableNames as $table){
            $tables[$table] = $table;
        };
        $items = ArrayHelper::map(Regularity::find()->joinWith('items')
            ->select(['regularity.name', 'item.title', 'item.id'])->where(['user_id' => Yii::$app->user->id])->asArray()
            ->all(), 'id', 'title', 'name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'tables'=>$tables,
                'items'=>$items,
            ]);
        }
    }

    /**
     * Updates an existing Rule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tables[''] ='';
        foreach (Yii::$app->db->schema->tableNames as $table){
            $tables[$table] = $table;
        };
        $items = ArrayHelper::map(Regularity::find()->joinWith('items')
            ->select(['regularity.name', 'item.title', 'item.id'])->where(['user_id' => Yii::$app->user->id])->asArray()
            ->all(), 'id', 'title', 'name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'tables'=>$tables,
                'items'=>$items,
            ]);
        }
    }

    /**
     * Deletes an existing Rule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rule::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionCheckRightAnswer()
    {
        $itemId = $_POST['itemId'];
        $countRightAnswer = 0;
        $countAnswer = 0;
        if(!empty($rules = \forma\modules\core\records\Rule::find()->where(['item_id'=>$itemId]))){
            foreach ($rules->all() as $rule){
                $countAnswer++;
                foreach ($rule->accessInterfaces as $accessInterface){
                    if($rule->count_action == $accessInterface->current_mark){
                        $countRightAnswer++;
                    }
                }
            }
        }
        $result = ['result'=>false];
        if($countAnswer == $countRightAnswer && $countAnswer!=0){
            $result = ['result'=>true];
            $result[] =['id'=>$itemId];
        }
        return $this->asJson($result);
    }
}
