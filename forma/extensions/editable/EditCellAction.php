<?php

namespace forma\extensions\editable;

use yii\base\Action;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;
use yii\web\Response;
use yii\widgets\ActiveForm;

class EditCellAction extends Action
{
    public $modelClass = '';

    protected $_response = ['success' => true, 'message' => ''];

    public function init()
    {
        //Yii::debug('sdf');
        //return 1;
        Yii::$app->response->format = Response::FORMAT_JSON;
      //  die("skljdaksjfsdkfjsldkflsdkfj");
    }

    public function run($id)
    {
        Yii::debug('Something new');

        if (empty($this->modelClass)) {
            throw new InvalidConfigException('Property modelClass cannot be blank');
        }

        /** @var ActiveRecord $modelClass */
        $modelClass = $this->modelClass;
        $model = $modelClass::findOne($id);
        $this->_response['modelProduct'] = $model;

        if (!$model->load(Yii::$app->request->post()) || !$model->save()) {
            Yii::debug('Ne sohran');
            $this->_response['success'] = false;
            $this->_response['message'] = $this->getError($model);
        }

        Yii::debug($model);

       // return 1;
        return $this->_response;
    }

    protected function getError($model)
    {
        $validation = ActiveForm::validate($model);
        if (empty($validation)) {
            return '';
        }
        $validation = array_shift($validation);
        $validation = array_shift($validation);
        return $validation;
    }
}
