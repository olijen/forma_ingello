<?php

namespace forma\modules\core\controllers;


use forma\modules\core\records\Item;
use forma\modules\core\records\ItemQuery;
use forma\modules\core\records\RegularityQuery;
use forma\modules\core\records\User;
use forma\modules\core\services\RegularityAndItemPictureService;
use forma\modules\product\records\Product;
use Yii;
use forma\modules\core\records\Regularity;
use forma\modules\core\records\RegularitySearch;
use yii\filters\AccessControl;
use yii\helpers\Url;
use forma\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * RegularityController implements the CRUD actions for Regularity model.
 */
class RegularityController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['regularity'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['regularity'],
                        'roles' => ['?', '@'],
                    ],

                ],
            ]
        ];
    }

    /**
     * Lists all Regularity models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RegularitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $regularitys = $dataProvider->getModels();
        $items = null;

        $order = array_column($regularitys, 'order');
        array_multisort($order, SORT_ASC, $regularitys);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'regularitys' => $regularitys,
            'items' => $items,
            'order_id' => $regularitys[0]['id'] ?? null
        ]);
    }

    public function actionRegularity()
    {
        $this->layout = 'public';

        $currentUserId = Yii::$app->user->isGuest == true ? $this->getPublicCurrentUserId() : null;
        $regularities = (new RegularityQuery(new Regularity()))->publicRegularities($currentUserId)->all();
        $regularitiesId = Regularity::getRegularitiesId($regularities);
        $allItems = (new ItemQuery(new Item()))->publicItems($regularitiesId)->all();
        $subItems = Item::getSubItems($allItems);
        $items = Item::getMainItems($allItems);
        $newUserReglament = 0;

        if (strpos( Url::previous(), 'test') !== false || true) {
            $newUserReglament = 1;
            Url::remember();

            return $this->render('user-regularity', [
                'regularities' => $regularities,
                'items' => $items,
                'subItems' => $subItems,
                'newUserReglament' => $newUserReglament
            ]);
            $this->layout = false;
            return $this->render('@app/modules/dark/views/default/forma_learning', [
                'regularities' => $regularities,
                'items' => $items,
                'subItems' => $subItems,
                'newUserReglament' => $newUserReglament
            ]);
        }

        return $this->render('user-regularity', [
            'regularities' => $regularities,
            'items' => $items,
            'subItems' => $subItems,
            'newUserReglament' => $newUserReglament
        ]);
    }

    public function getPublicCurrentUserId() // http://localhost:8891/admin/regularity передается ссылка подобного формата
    {
        //$_GET['without-header'] = true;// указывает на загрузку лейаута без хедера и левой панельки (смотреть /layouts/main.php)
        //$currentUrl = Url::current();
        //$currentUserName = substr($currentUrl, 1, strrpos($currentUrl, '/') - 1);// берем логин юзера admin

        if (Yii::$app->user->isGuest)
            return $_GET['userId'];// по логину находим юзера
        return Yii::$app->user->id;// по логину находим юзера
    }

    public function actionSettings()
    {
        $searchModel = new RegularitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('settings', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Regularity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Regularity();
        $model->loadDefaultValues(); //load default data from db
        $model->user_id = Yii::$app->user->identity->id;
        if ($model->load(Yii::$app->request->post()) && RegularityAndItemPictureService::save($model)) {
            return $this->redirect('/core/regularity');
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Regularity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && RegularityAndItemPictureService::save($model)) {
            return $this->redirect('/core/regularity');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Regularity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/core/regularity/']);
    }

    /**
     * Finds the Regularity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Regularity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Regularity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
