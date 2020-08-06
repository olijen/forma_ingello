<?php


namespace forma\modules\core\services;


use yii\helpers\Html;
use yii\web\UploadedFile;

class RegularityAndItemPictureService
{
    public static function savePicture($model)
    {
        $post = $_POST['Item'];
        $model->picture = UploadedFile::getInstance($model, 'picture');
        if ($model->picture !== null) {
            if ($model->validate()) {

                $model->picture->SaveAs($_SERVER['DOCUMENT_ROOT'] . '/regularity_images'
                    . '/' . $model->picture->baseName . '.' . $model->picture->extension);
                $model->picture = ('/regularity_images/' . $model->picture->baseName . '.' . $model->picture->extension);
                $model->save(false);  // without validation

                return true;
            }
        }

        if (!empty($post['pictureUrl']) && empty($model->picture)) {
            $model->picture = $post['pictureUrl'];
        }

        return false;
    }

    public static function save($model)
    {
        if (self::savePicture($model) === false) {
            if (!$model->validate()) {
                return false;
            }

            if (!$model->save()) {
                throw new \Exception('Сохранение итема или регламента' . json_encode($model->attributes));
            }
        }

        return true;
    }

    public static function getPictureUrl($model)
    {
        if (!empty($model->picture)) {
            return Html::img('@web' . $model->picture,
                $options = ['class' => 'postImg', 'style' => ['width' => '200px']]);
        }
        return false;
    }
}