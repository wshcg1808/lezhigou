<?php

namespace admin\components;


use common\services\GetOperateInfo;

//date()获取系统时间不对需加入这句
date_default_timezone_set('PRC');

/**
 * @author lovebing Created on 十一月 19, 2017
 */
class BaseController extends \common\components\BaseController
{

    //当前登录管理员对象
    public $this_user = null;

    public function beforeAction($action)
    {
        $getOperateInfo = new GetOperateInfo();
        parent::beforeAction($action);//进行父类重写
        $controller = \Yii::$app->controller->id;//控制器名称
        $action = $this->action->id;//方法名称
        $ip = $_SERVER["REMOTE_ADDR"];//用户IP
        $time = date("Y-m-d H:i:s");
        $info = "time:" . $time . "----" . "操作系统：" . $getOperateInfo->get_os() . "----" . "操作系统语言：" . $getOperateInfo->get_lang() . "----" . "浏览器：" . $getOperateInfo->browse_info()[0] . "----" . "浏览器版本：" . $getOperateInfo->browse_info()[1] . "----" . 'IP:' . $ip . '----' . '操作URL：' . $controller . '/' . $action;
        file_put_contents("log.txt", $info . PHP_EOL, FILE_APPEND);//模拟插入数据库暂时写入文件中，你可以直接插入数据库
        return true;
    }
}