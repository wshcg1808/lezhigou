<?php

namespace admin\controllers;

//header("Access-Control-Allow-Origin:http://www.demo.com");
//header("Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type,x-access-token");
//header("Access-Control-Allow-Methods:HEAD, GET, POST, DELETE, PUT, OPTIONS");

use admin\components\BaseController;
use common\services\GetOperateInfo;

class SiteController extends BaseController
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        return array("data" => "sas", "msg" => "查询成功");
    }

    public function actionInfo()
    {
        $token = \Yii::$app->request->headers->get('x-access-token');
        return json_encode("dssad");
    }

    /**
     * 单元测试事物
     */
    public function actionTest()
    {
        $getOperateInfo=new GetOperateInfo();
        $info=$getOperateInfo->browse_info();
//        die($info[1]);
        return $info[0];
    }

}
