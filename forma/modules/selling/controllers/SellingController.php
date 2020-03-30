<?php

namespace forma\modules\selling\controllers;

use Yii;
use forma\modules\selling\records\Selling;
use forma\modules\selling\records\selling\SellingSearch;
use forma\modules\selling\records\selling\SellingProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SellingController implements the CRUD actions for Selling model.
 */
class SellingController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionBidForm()
    {
        return $this->render('bid', []);
    }

    public function actionCreateBid($link, $text = '') {

        $curl = curl_init();
        $response = [];

        $parts = explode('/', $link);
        $id = $parts[count($parts)-1];
        $id = explode('.', $id)[0];

        $days = 90;
        $amount = 500000;
        $tpl = 'Меня заинтересовал Ваш проект, но мне не хватает некоторых данных,'.
            ' что бы оценить объём работ. В первую очередь нужно сразу'.
            ' зафиксировать критерии системного качества, что бы мы понимали '.
            'Ваши ожидания. И есть вопросы по функциональности. '.
            'Было бы удобнее созвониться, обсудить задачи, разбить работу на этапы. '.
            'Актуальные цены есть в профиле. На данный момент мы с командой '.
            'разрабатываем свою облачную платформу http://forma.ingello.com. '.
            'В течении пары часов готовы переключиться на Ваш проект.';

        $tpl = trim($tpl);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.freelancehunt.com/v2/projects/$id/bids",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"days\": $days,\"safe_type\": \"employer\",\"budget\": {    \"amount\": $amount,    \"currency\": \"UAH\"},\"comment\": \"$text. $tpl\",\"is_hidden\": true}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer a80ee1fc7d242f9000be6f898e67d826fa3ff153",
                "Content-Type: application/json"
            ),
        ));

        $response[] = curl_exec($curl);

        curl_close($curl);

        echo "<a href=selling/selling/bid-form>Форма ставок</a><hr>";
        echo "<pre>";
        var_dump($response);
        echo "</pre>";
        exit;
    }

    public function actionCreateBids($ids)
    {
        $curl = curl_init();
        $response = [];
        $ids = explode('--', $ids);

        foreach ($ids as $id) {
            $parts = explode('__', $id);
            $id = $parts[0];
            $text = '';
            if (isset($parts[1])) {
                $text = $parts[1];
            }

            $days = 90;
            $amount = 500000;
            $tpl = 'Меня заинтересовал Ваш проект, но мне не хватает некоторых данных,'.
                ' что бы оценить объём работ. В первую очередь нужно сразу'.
                ' зафиксировать критерии системного качества, что бы мы понимали '.
                'Ваши ожидания. И есть вопросы по функциональности. '.
                'Было бы удобнее созвониться, обсудить задачи, разбить работу на этапы. '.
                'Актуальные цены есть в профиле. На данный момент мы с командой '.
                'разрабатываем свою облачную платформу http://forma.ingello.com. '.
                'В течении пары часов готовы переключиться на Ваш проект.';

            $tpl = trim($tpl);

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.freelancehunt.com/v2/projects/$id/bids",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\"days\": $days,\"safe_type\": \"employer\",\"budget\": {    \"amount\": $amount,    \"currency\": \"UAH\"},\"comment\": \"$text. $tpl\",\"is_hidden\": true}",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer a80ee1fc7d242f9000be6f898e67d826fa3ff153",
                    "Content-Type: application/json"
                ),
            ));

            $response[] = curl_exec($curl);
        }

        curl_close($curl);

        echo "<a href=selling/selling/bid-form>Форма ставок</a><hr>";
        echo "<pre>";
        var_dump($response);
        echo "</pre>";
        exit;
    }

    /**
     * Lists all Selling models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SellingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Selling model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $sellingProductsSearchModel = new SellingProductSearch;

        $params = Yii::$app->request->queryParams;
        $params['SellingProductSearch']['selling_id'] = $id;

        $sellingProductsDataProvider = $sellingProductsSearchModel->search($params);

        return $this->render('view', compact(
            'model',
            'sellingProductsSearchModel',
            'sellingProductsDataProvider'
        ));
    }

    /**
     * Creates a new Selling model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Selling();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Selling model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Selling model.
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
     * Finds the Selling model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Selling the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Selling::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
