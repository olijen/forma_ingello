<?php

namespace forma\modules\core\controllers;

use forma\modules\core\records\UserProfile;
use rmrevin\yii\ionicon\AssetBundle;
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
use rmrevin\yii\fontawesome\FontAwesome;

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
     * @param $key
     * @return array
     * Метод Вывода названий таблиц, а также получения ссылок на публичный регламент
     */
    public function tableTranslate($key = true): array
    {
        $groupTable = [
            '' => '',
            'Управление' => ['/core/regularity/regularity'],
            'Продажи' => ['/core/regularity/regularity'],
            'Найм и проекты' => ['/core/regularity/regularity'],
            'Продукты и услуги' => ['/core/regularity/regularity'],
            'Хранилища' => ['/core/regularity/regularity'],
        ];

        $groupTable['Управление']['event'] = 'Событие';
        $groupTable['Управление']['event_type'] = 'Тип события';
        $groupTable['Управление']['interview'] = 'Интервью';
        $groupTable['Управление']['interview_state'] = 'Состояние интервью';
        $groupTable['Управление']['vacancy'] = 'Вакансия';
        $groupTable['Управление']['regularity'] = 'Регламент';
        $groupTable['Управление']['message'] = 'Сообщение';
        $groupTable['Управление']['widget_user'] = 'Дашборд';
        $groupTable['Управление']['worker'] = 'Кадр';
        $groupTable['Управление']['item'] = 'Пункт регламента';
        $groupTable['Управление']['system_event_user'] = 'Подписка на событие';

        $groupTable['Найм и проекты']['country'] = 'Страна';
        $groupTable['Найм и проекты']['currency'] = 'Валюта';
        $groupTable['Найм и проекты']['project'] = 'Проект';
        $groupTable['Найм и проекты']['project_user'] = 'Проект пользователя';
        $groupTable['Найм и проекты']['project_vacancy'] = 'Проект вакансии';
        $groupTable['Найм и проекты']['manufacturer'] = 'Производитель';

        $groupTable['Продажи']['customer'] = 'Клиент';
        $groupTable['Продажи']['customer_source'] = 'Источник клиента';
        $groupTable['Продажи']['selling_product'] = 'Товар в продаже';
        $groupTable['Продажи']['selling'] = 'Продажа';
        $groupTable['Продажи']['state'] = 'Состояние продажи';
        $groupTable['Продажи']['test_type'] = 'Тест';
        $groupTable['Продажи']['test_type_field'] = 'Вопрос и ответы';
        $groupTable['Продажи']['strategy'] = 'Стратегия';
        $groupTable['Продажи']['answer'] = 'Ответ диалога';
        $groupTable['Продажи']['request'] = 'Вопрос диалога';


        $groupTable['Хранилища']['inventorization'] = 'Инвентаризация';
        $groupTable['Хранилища']['inventorization_product'] = 'Инвентаризация продукции';
        $groupTable['Хранилища']['supplier'] = 'Поставщик';
        $groupTable['Хранилища']['purchase_overhead_cost'] = 'Накладная расхода на закупку';

        $groupTable['Продукты и услуги']['product'] = 'Продукция';
        $groupTable['Продукты и услуги']['category'] = 'Категория';
        $groupTable['Продукты и услуги']['purchase'] = 'Поставка';
        $groupTable['Продукты и услуги']['product_pack_unit'] = 'Единица упаковки продукта';
        $groupTable['Продукты и услуги']['purchase_product'] = 'Товар в поставке';
        $groupTable['Продукты и услуги']['warehouse'] = 'Склад';
        $groupTable['Продукты и услуги']['field'] = 'Характеристика категории';
        $groupTable['Продукты и услуги']['warehouse_product'] = 'Продукция на складе';
        $groupTable['Продукты и услуги']['transit'] = 'Перемещение';
        $groupTable['Продукты и услуги']['transit_product'] = 'Товар в перемещении';

        if ($key == false) {
            foreach ($groupTable as $key => $table) {
                if ($groupTable[$key]) {
                    unset($groupTable[$key][0]);
                }
            }
            return $groupTable;
        } else {
            return $groupTable;
        }
    }

    /**
     * @param $groupTable
     * @param $nameTable
     * @return void
     * Получение ссылки по группе и таблице
     */
    public function getLinkEvent($groupTable, $nameTable)
    {
        foreach ($groupTable as $key => $table) {
            if ($groupTable[$key]) {
                if (isset($groupTable[$key][$nameTable])) {
                    return $groupTable[$key][0];
                }
            }
        }
    }

    /**
     * Lists all Rule models.
     * @return mixed
     */
    public function actionIndex()
    {
        $icons = array_slice((new \ReflectionClass(FontAwesome::class))->getConstants(), 21, -1);
        $groupTable = $this->tableTranslate(false);
        $searchModel = new RuleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $items = ArrayHelper::map(Regularity::find()->joinWith('items')
            ->select(['regularity.name', 'item.title', 'item.id'])->where(['user_id' => Yii::$app->user->id])->asArray()
            ->all(), 'title', 'title', 'name');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tables' => $groupTable,
            'items' => $items,
            'icons' => $icons,
        ]);
    }

    /**
     * Displays a single Rule model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $rule = $this->findModel($id);
        $item = Item::find()->where(['id' => $rule->item->id])->one();
        return $this->render('view', [
            'model' => $rule,
            'item' => $item,
        ]);
    }

    /**
     * @param $id
     * @return void
     * Метод перезаписи Ранга пользователя по Рангу
     */
    public function resetUserRankByRankId($id)
    {
        $userProfiles = UserProfile::find()->where(['rank_id' => $id])->all();
        foreach ($userProfiles as $userProfile) {
            $userProfile->rank_id = null;
            $userProfile->save();
        }
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
        $tables = $this->tableTranslate(false);
        $items = ArrayHelper::map(Regularity::find()->joinWith('items')
            ->select(['regularity.name', 'item.title', 'item.id'])->where(['user_id' => Yii::$app->user->id])->asArray()
            ->all(), 'id', 'title', 'name');
        if (isset($_POST['Rule']['table'])) {
            if ($result = $this->getLinkEvent($this->tableTranslate(), $_POST['Rule']['table'])) {
                $model->link = $result;
            }
        }
        $icons = array_slice((new \ReflectionClass(FontAwesome::class))->getConstants(), 21, -1);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->resetUserRankByRankId($model->rank_id);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'tables' => $tables,
                'items' => $items,
                'icons' => $icons,
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
        $tables = $this->tableTranslate(false);
        if (isset($tables['Управление']['0'])) {
            unset($tables['Управление']['0']);
        }
        $icons = array_slice((new \ReflectionClass(FontAwesome::class))->getConstants(), 21, -1);
        $model = $this->findModel($id);
        $items = ArrayHelper::map(Regularity::find()->joinWith('items')
            ->select(['regularity.name', 'item.title', 'item.id'])->where(['user_id' => Yii::$app->user->id])->asArray()
            ->all(), 'id', 'title', 'name');
        if (isset($_POST['Rule']['table'])) {
            if ($result = $this->getLinkEvent($this->tableTranslate(), $_POST['Rule']['table'])) {
                $model->link = $result;
            }
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->resetUserRankByRankId($model->rank_id);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'tables' => $tables,
                'items' => $items,
                'icons' => $icons,
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
        $model = $this->findModel($id);
        $this->resetUserRankByRankId($model->rank_id);
        $model->delete();
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
        $result = ['result' => false];
        if ($countAnswer == $countRightAnswer && $countAnswer != 0) {
            $result = ['result' => true];
            $result[] = ['id' => $itemId];
        }
        return $this->asJson($result);
    }

    public function actionUserRule()
    {
        $searchModel = new AccessInterfaceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('user-rule', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
