<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/15
 * Time: 17:47
 */

namespace admin\controllers;


use admin\services\ActivityDelService;
use yii\web\Controller;

class ActivityController extends Controller
{
    public function actionDel()
    {
        $activity_id = \Yii::$app->request->post("activity_id");
        $activityDelService = new ActivityDelService();
        $activityDelService->del($activity_id);
        return json_encode(array("msg" => "删除成功"));
    }
}