<?php

namespace forma\modules\core\controllers;

use forma\modules\core\records\AccessInterface;
use forma\modules\core\records\AccessInterfaceSearch;
use Yii;
use forma\modules\core\records\Rule;
use forma\modules\core\records\RuleSearch;
use yii\console\widgets\Table;
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
    public  function tableTranslate(): array
    {
        $groupTable = [
            ''=>'',
            'Управление'=>[],
            'Продажи'=>[],
            'Найм и проекты'=>[],
            'Продукты и услуги'=>[],
            'Хранилища'=>[],
        ];
        $groupTable['Управление']['answer'] = 'Ответы';
        $groupTable['Управление']['event'] = 'События';
        $groupTable['Управление']['event_type'] = 'Типы событий';
        $groupTable['Управление']['interview'] = 'Интервью';
        $groupTable['Управление']['interview_state'] = 'Состояние интервью';
        $groupTable['Управление']['vacancy'] = 'Вакансии';
        $groupTable['Управление']['strategy'] = 'Стратегии';
        $groupTable['Управление']['regularity'] = 'Регламент';
        $groupTable['Управление']['message'] = 'Сообщения';
        $groupTable['Управление']['widget_user'] = 'Дашборд';

        $groupTable['Найм и проекты']['country'] = 'Страны';
        $groupTable['Найм и проекты']['currency'] = 'Валюта';
        $groupTable['Найм и проекты']['project'] = 'Проекты';
        $groupTable['Найм и проекты']['project_user'] = 'Проекты пользователя';
        $groupTable['Найм и проекты']['project_vacancy'] = 'Проекты вакансии';
        $groupTable['Найм и проекты']['manufacturer'] = 'Производитель';

        $groupTable['Продажи']['customer'] = 'Клиенты';
        $groupTable['Продажи']['customer_source'] = 'Источники клиентов';
        $groupTable['Продажи']['purchase_product'] = 'Покупка продукта';
        $groupTable['Продажи']['selling'] = 'Продажа';
        $groupTable['Продажи']['purchase'] = 'Покупка';

        $groupTable['Хранилища']['inventorization'] = 'Инвентаризация';
        $groupTable['Хранилища']['inventorization_product'] = 'Инвентаризация продукции';
        $groupTable['Хранилища']['supplier'] = 'Поставщики';
        $groupTable['Хранилища']['purchase_overhead_cost'] = 'Накладные расходы на закупку';

        $groupTable['Продукты и услуги']['product'] = 'Продукция';
        $groupTable['Продукты и услуги']['product_pack_unit'] = 'Единица упаковки продукта';
        $groupTable['Продукты и услуги']['selling_product'] = 'Продажа продукции';
        $groupTable['Продукты и услуги']['selling_product'] = 'Продажа продукта';
        $groupTable['Продукты и услуги']['warehouse'] = 'Склад';
        $groupTable['Продукты и услуги']['warehouse_product'] = 'Продукция на складе';
        return $groupTable;
    }
    /**
     * Lists all Rule models.
     * @return mixed
     */
    public function actionIndex()
    {
        $groupTable = $this->tableTranslate();
        $searchModel = new RuleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $items = ArrayHelper::map(Regularity::find()->joinWith('items')
            ->select(['regularity.name', 'item.title', 'item.id'])->where(['user_id' => Yii::$app->user->id])->asArray()
            ->all(), 'title', 'title', 'name');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tables'=>$groupTable,
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
        $tables = $this->tableTranslate();
        $items = ArrayHelper::map(Regularity::find()->joinWith('items')
            ->select(['regularity.name', 'item.title', 'item.id'])->where(['user_id' => Yii::$app->user->id])->asArray()
            ->all(), 'id', 'title', 'name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
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
        $tables = $this->tableTranslate();
        $model = $this->findModel($id);
        $searchModel = new AccessInterfaceSearch();
        $dataProvider = $searchModel->searchRule(Yii::$app->request->queryParams,$id);
        $items = ArrayHelper::map(Regularity::find()->joinWith('items')
            ->select(['regularity.name', 'item.title', 'item.id'])->where(['user_id' => Yii::$app->user->id])->asArray()
            ->all(), 'id', 'title', 'name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'tables'=>$tables,
                'items'=>$items,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
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
        $countRegularityItem = 0;
        $countRightRegularityItem = 0;

        $item = Item::find()->where(['id' => $itemId])->one();
        $regularity = Regularity::find()->where(['id' => $item->regularity_id])->one();

        $rulesData = \forma\modules\core\records\Rule::find()->joinWith(['itemRule'=>function($q){
            $q->joinWith('itemInterface');
        }])->all();
        $userData = AccessInterface::find()->where(['user_id'=>Yii::$app->user->id])->all();
        foreach ($regularity->items as $regularityItem) {
            foreach ($rulesData as $rulesDatum) {
                if ($rulesDatum->item_id == $regularityItem->id) {
                    $countRegularityItem++;
                    foreach ($userData as $userDatum) {
                        if ($userDatum->rule_id == $rulesDatum->id && $userDatum->status == 1) {
                            $countRightRegularityItem++;
                        }
                    }
                }
            }
        }

        if (!empty($rules = \forma\modules\core\records\Rule::find()->where(['item_id' => $itemId]))) {
            foreach ($rules->all() as $rule) {
                $countAnswer++;
                foreach ($rule->accessInterfaces as $accessInterface) {
                    if ($rule->count_action == $accessInterface->current_mark) {
                        $countRightAnswer++;
                    }
                }
            }
        }

        $result = ['result'=>false];
        if($countAnswer == $countRightAnswer && $countAnswer != 0) {
            $result = ['result'=>true];
            $result[] =['id'=>$itemId];
        }

        if ($countRegularityItem == $countRightRegularityItem && $countRegularityItem != 0) {
            $result[] = ['allAnswer' => true];
        }
        return $this->asJson($result);
    }
    public  function  actionUserRule(){
        $searchModel = new AccessInterfaceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('user-rule', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
