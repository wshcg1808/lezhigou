<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/15
 * Time: 15:03
 */

namespace admin\controllers;


use admin\services\UploadForm;
use yii\web\Controller;
use yii\web\UploadedFile;

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type,x-access-token");
header("Access-Control-Allow-Methods:HEAD, GET, POST, DELETE, PUT, OPTIONS");

class UploadController extends Controller
{

    public function actionUpload()
    {
        $file_model = new UploadForm();
        if (\Yii::$app->request->isPost) {
            $file_model->imageFile = UploadedFile::getInstanceByName('file');
            if (!$file_model->validate()) {
                throw new \RuntimeException(implode('',$file_model->getFirstErrors()));
            } else {
                $file_model->imageFile->saveAs('../../uploads/' . $file_model->imageFile->baseName.time() . '.' . $file_model->imageFile->extension);
            }
        }
    }

}