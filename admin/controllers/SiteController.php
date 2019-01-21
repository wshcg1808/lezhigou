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
        $getOperateInfo = new GetOperateInfo();
        $info = $getOperateInfo->browse_info();
//        die($info[1]);
        return $info[0];
    }
    
    /**
     * 单元测试
     */
    public function actionGet()
    {
        // 获取 redis 组件
        $redis = \Yii::$app->redis;

// 判断 key 为 username 的是否有值，有则打印，没有则赋值
        $key = 'username';
        $redis->set($key, 'marko');
        if ($val = $redis->get($key)) {
            var_dump($val);
        } else {
            $redis->set($key, 'marko');
            $redis->expire($key, 5);
        }
    }
    
    
    /**
     * 算法
     * 冒泡排序
     * @return array
     */
    public function actionShow()
    {
        $arr = array(6, 3, 8, 2, 9, 1);
        $count = count($arr);
        for ($i = 0; $i < $count - 1; $i++) {
            for ($j = 0; $j < $count - 1 - $i; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
        }
        return $arr;
    }
}
