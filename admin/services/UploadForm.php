<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/15
 * Time: 15:04
 */

namespace admin\services;


use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{


    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,jpeg,png'],
        ];
    }



}