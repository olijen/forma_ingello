<?php

namespace forma\modules\selling\controllers;

use forma\components\AccessoryActiveRecord;
use forma\components\ExcelImporter;
use forma\modules\customer\records\Customer;
use forma\modules\selling\records\selling\Selling;
use forma\modules\selling\records\state\State;
use forma\modules\selling\services\NomenclatureService;
use forma\modules\selling\services\SellingService;
use forma\modules\selling\services\SuperSellingHasEditableService;
use forma\modules\selling\services\SuperSellingImportService;
use Yii;
use forma\modules\selling\records\superselling\SellingSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * SuperSellingController implements the CRUD actions for Selling model.
 */
class SuperSellingController extends Controller
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
     * Lists all Selling models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SellingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (Yii::$app->request->post('hasEditable')) {
            $requestPost = Yii::$app->request->post();
            $superSellingEditableService = new SuperSellingHasEditableService();
            $superSellingEditableService
                ->setAttribute($requestPost['editableKey'], $requestPost['editableIndex'], $requestPost['editableAttribute'], $requestPost['Selling']);
            if ($output = $superSellingEditableService->editColumn()) {
                $data = ['output' => $output];
                return json_encode($data);
            } else {
                return false;
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionDelete($id)
    {
        SellingService::delete($id);
        $this->redirect('index');
    }
    public function actionDeleteSelection()
    {
        $selection = Yii::$app->request->post('selection');
        if ($selection) {
            NomenclatureService::deleteAllBySelling($selection);
            Selling::deleteAll(['IN', 'id', $selection]);
        }

        return $this->redirect('index');
    }

    /**
     * Метод Выгрузки примера для импорта по продажам клиентов
     */
    public function actionDownloadExampleFile()
    {
        $path = \Yii::getAlias('@uploads');
        $file = $path . '/пример_продажи_клиентов.csv';
        if (file_exists($file)) {
            return \Yii::$app->response->sendFile($file);
        }
        throw new \Exception('Файл не найден!!!');
    }

    /**
     * Метод загрузки файла для импорта в базу данных по клиентам и продажам
     */
    public function actionImportFile()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $tmpName = $_FILES['csv']['tmp_name'];;
            $csvAsArray = array_map('str_getcsv', file($tmpName));

            $sellingOneState = (new SuperSellingImportService($csvAsArray))->isError();
            $msgErrors = "";
            $msgInfo = "";

            if (isset($sellingOneState['info'])) {
                if ($sellingOneState['info']) {
                    foreach ($sellingOneState['info'] as $sellingId => $sellingColumn) {
                        $msgInfo .= "\n" . "Продажа <a href='/selling/form?id=$sellingId'>перейти</a>" . "\n" . $sellingColumn['date_create'] . "\n" . $sellingColumn['selling_token'] . "\n" . $sellingColumn['state'] . "\n";
                    }
                }
            }

            if (isset($sellingOneState['errors'])) {
                if ($sellingOneState['errors'] !== true) {
                    foreach ($sellingOneState['errors'] as $key => $dataError) {
                        $msgError = "";
                        foreach ($dataError as $errorValue) {
                            $msgError .= "\n" . $errorValue[0] . "\n";
                        }

                        $msgErrors .= "\n" . "В строке: " . ($key + 1) . ", " . $msgError . "\n";
                    }
                }
            }

            return json_encode(compact('msgErrors', 'msgInfo'));
        }
    }
}
