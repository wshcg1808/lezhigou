<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/15
 * Time: 17:47
 */

namespace admin\controllers;


use admin\components\BaseController;
use admin\services\ActivityDelService;

class ActivityController extends BaseController
{
    public function actionDel()
    {
        $activity_id = \Yii::$app->request->post("activity_id");
        $activityDelService = new ActivityDelService();
        $activityDelService->del($activity_id);
        return array("msg" => "删除成功");
    }
}