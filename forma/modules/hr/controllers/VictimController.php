<?php

namespace forma\modules\hr\controllers;

use forma\components\Controller;
use forma\modules\hr\records\victim\Victim;
use forma\modules\hr\records\victim\VictimSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * VictimController implements the CRUD actions for Victim model.
 */
class VictimController extends Controller
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
     * Lists all Victim models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->request->post('hasEditable')) {
            $requestPost = Yii::$app->request->post();

            $victimId = $requestPost['editableKey'];
            $victimColumn = $requestPost['editableAttribute'];
            $victimData = $requestPost['Victim'][array_key_first($requestPost['Victim'])][$victimColumn];

            $victimUpdate = Victim::find()->where(['id' => $victimId])->one();

            if ($victimUpdate->$victimColumn != $victimData) {
                $victimUpdate->$victimColumn = $victimData;
                if ($victimUpdate->validate() && $victimUpdate->save()) {
                    $data = ['output' => [$victimData]];
                    return json_encode($data);
                }
            } else {
                $data = ['output' => [$victimUpdate->$victimColumn]];
                return json_encode($data);
            }
        }

        $searchModel = new VictimSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $hexMin = 5;
        $hexMax = 9;

        $victim = $dataProvider->getModels();

        $arrayVictimColor = array();
        foreach ($victim as $attributeVictim) {
            foreach ($victim as $attributeVictimSearch) {
                if (explode(' ', $attributeVictim->fullname)[0] == explode(' ', $attributeVictimSearch->fullname)[0]
                    && $attributeVictim->id != $attributeVictimSearch->id) {
                    if (!empty($arrayVictimColor)) {
                        foreach ($arrayVictimColor as $key => $item) {
                            if ($key != explode(' ', $attributeVictim->fullname)[0]) {
                                $arrayVictimColor [explode(' ', $attributeVictim->fullname)[0]] = '#' . mt_rand($hexMin, $hexMax)
                                    . mt_rand($hexMin, $hexMax) . mt_rand($hexMin, $hexMax) . mt_rand($hexMin, $hexMax)
                                    . mt_rand($hexMin, $hexMax) . mt_rand($hexMin, $hexMax);

                            }
                        }
                    } else {
                        $arrayVictimColor [explode(' ', $attributeVictim->fullname)[0]] = '#' . mt_rand($hexMin, $hexMax)
                            . mt_rand($hexMin, $hexMax) . mt_rand($hexMin, $hexMax) . mt_rand($hexMin, $hexMax)
                            . mt_rand($hexMin, $hexMax) . mt_rand($hexMin, $hexMax);
                    }
                }
            }
        }

        if ($victimId = Yii::$app->request->get('id')) {
            $victim = $this->findModel($victimId);

            if ($victim->load(Yii::$app->request->post()) && $victim->save()) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                $data = ['output' => $victim->getAttributes(), 'success' => true];

                return $data;
            } else {
                return false;
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'arrayVictimColor' => $arrayVictimColor,
        ]);
    }

    /**
     * Displays a single Victim model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Victim model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Victim();
        $model->loadDefaultValues(); //load default data from db

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->how_many > 1) {
                for ($i = 1; $i < $model->how_many; $i++) {
                    $modelChild = new Victim();
                    $modelChild->loadDefaultValues();
                    $modelChild->stay_for = $model->stay_for;
                    $modelChild->phone = $model->phone;
                    $modelChild->specialization = '-';
                    $modelChild->destination = $model->destination;
                    $modelChild->save();
                }
            }

            return $this->redirect('/hr/volunteer/index?how_many=' . $model->how_many . '&support_type=' . 0);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Victim model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Victim model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionChange()
    {
        $warnings = 0;
        $sql = '';
        $unique_name_where_to_settle = [];
        $unique_sex = [];
        $models = Victim::find()->where('regid > 0')->all();

        foreach ($models as $model) {
            $sql .= "INSERT INTO accessory SET (entity_class='"
                . 'forma\modules\hr\records\victim\Victim'
                . "', entity_id={$model->id}, user_id=95); <br>";

            //Даты: написать алгоритм выявления некорректных дат и вывести их (писать на пхп, вывести ИД-шники) - Создать отдельное поле для такой даты
            // birthday2
            if ($date = $this->checkDate($model->birthday2, $model->regid)) {
                $model->birthday = $this->convertDate($date);
            } else $warnings++;
            // registered_at2
            if ($date = $this->checkDate($model->registered_at2, $model->regid)) {
                $model->registered_at = $this->convertDate($date);
            } else $warnings++;

            //Телефонные номера - иногда есть сразу в в одном поле (можно написать скрипт, выбирать один номер, а остальное добавлять к комментарию). Удалить пробелы и не-цифры.
            $model->phone = str_replace(' ', '', $model->phone);

            $oldPhone = $model->phone;
            //try to correct date
            //$date = str_replace('/', '.', $date);
            //$date = str_replace(' ', '', $date);
            $symbs =  ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];

            $callback = function ($a, $b) use ($symbs) {
                if (in_array($b, $symbs)) $a .= $b;
                return $a;
            };

            $model->phone = array_reduce(str_split($model->phone), $callback, "");

            if ($oldPhone != $model->phone) {
                if (strlen($model->phone) > 15) {
                    $warnings++;
                    echo $model->regid . '|' . $model->phone . ' Ошибка телефона <br>';
                } else {
                    $model->questions .= $oldPhone;
                    echo $model->regid . '|' . $oldPhone . ' ЗАМЕНЕНА НА >>>>>>>>> '.$model->phone.' остальное добавлено в комментарии<br>';
                }
            }


            //name_where_to_settle: вывести все уникальные именования
            if (!isset($uniqueS[$model->name_where_to_settle])) {
                $unique_name_where_to_settle[$model->name_where_to_settle] = $model->name_where_to_settle;
            }
            //Стать: создать отдельное поле. Вывести уникальные варианты. todo: Каждый из них перевести в 1 или 0.
            // ЧТО ДЕЛАТЬ С БЕСПОЛЫМИ?
            if (!isset($unique_sex[$model->sex])) {
                $unique_sex[$model->sex] = $model->sex;
            }
            if (!$model->sex) {
                $warnings++;
                echo $model->regid . '|' . $model->sex . ' Бесполый <br>';
            } else {
                $sexMap = [
                    'ж' => '1',
                    'ч' => '2',
                    'ч.' => '2',
                    'ж.' => '1',
                    'ж ' => '1',
                    'д' => '1',
                    'м' => '2',
                    'чол.' => '2',
                    'жін' => '1',
                    'жін.' => '1',
                    'чол' => '2',
                ];
                $model->sex = $sexMap[$model->sex];
            }
            //Что делать с безымянными?
            if (!$model->fullname) {
                $warnings++;
                echo $model->regid . '|' . $model->fullname . ' Безымянный <br>';
            }
            //Что делать с нерождёнными? (по идее их отметит чекер дат)
            //Что делать с бездомными?
            if (!$model->place_of_residence) {
                $warnings++;
                echo $model->regid . '|' . $model->place_of_residence . ' Бездомный <br>';
            }
        }

        echo 'КОЛИЧЕСТВО ОШИБОК: ' . $warnings;
        echo '<pre>';
        var_dump('UNIQUE PLACES', $unique_name_where_to_settle);
        var_dump('UNIQUE SEX', $unique_sex);
        echo '</pre>';

        echo $sql;
exit;
        return;
        if (!$model->save()) {
            var_dump($model->getErrors());
            if (!$model->errors) {
                echo 'ERRRRORRRRYSHKAAAAAAAAAA before save <Br>';
            }
        }

    }

    private function checkDate($date, $id, $delim = '.')
    {
        //todo: try to correct here
        $oldDate = $date;
        //try to correct date
        $date = str_replace('/', '.', $date);
        $date = str_replace(',', '.', $date);
        $date = str_replace(' ', '', $date);
        $symbs =  ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "."];

        $callback = function ($a, $b) use ($symbs) {
            if (in_array($b, $symbs)) $a .= $b;
            return $a;
        };

        $date = array_reduce(str_split($date), $callback, "");

        if ($oldDate != $date) {
            echo $id . '|' . $oldDate . ' ЗАМЕНЕНА НА >>>>>>> '.$date.'<br>';
        }

        //check ------------------------------------------------------------
        $parts = explode($delim, $date);
        if (count($parts) != 3) {
            if (strlen($date) == 0)
                echo $id . '|' . $date . ' Дата отсутствует <br>';
            else
                echo $id . '|' . $date . ' Неверный формат точки <br>';
        }
        elseif (strlen($parts[0]) != 2 || strlen($parts[1]) != 2 || strlen($parts[2]) != 4) {
            echo $id . '|' . $date . ' Формат дня или месяца или года неверен <br>';
        } else {
            return $date;
        }
        return false;
    }

    private function convertDate($date)
    {
        //echo $date;
        $parts = explode('.', $date);
        $date = $parts[2].'-'.$parts[1].'-'.$parts[0].'-';
        return $date;
    }

    /**
     * Finds the Victim model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Victim the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Victim::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
