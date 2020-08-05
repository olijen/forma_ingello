<?php


namespace forma\modules\core\services;


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
                    . '/' . $model->picture->baseName . $model->picture->extension);
                $model->picture = ('@web/regularity_images/' . $model->picture->baseName . $model->picture->extension);
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

            return true;
        }
    }
}