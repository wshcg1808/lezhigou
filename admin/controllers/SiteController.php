<?php

namespace admin\controllers;

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type,x-access-token");
header("Access-Control-Allow-Methods:HEAD, GET, POST, DELETE, PUT, OPTIONS");

use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
//        $aa=\Yii::$app->request->get("aa");
        return "aaa";
    }

    public function actionInfo()
    {
        return "info";
    }

    /**
     * 单元测试事物
     */
    public function actionTest(){
        return "test";
    }

}
