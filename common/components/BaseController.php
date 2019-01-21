<?php

namespace common\components;

use common\ControllerHelper;
use yii\web\Controller;

/**
 * @author lovebing Created on Jul 23, 2017
 */
class BaseController extends Controller {

    public function init()
    {
        //yii2中自定义表单或者post请求 csrf验证（防跨站伪请求）
        //关闭Yii2.0自定义的csrf验证
        $this->enableCsrfValidation = false;
        ControllerHelper::init();
        parent::init();
    }



    public function runAction($id, $params = [])
    {
        try {
            return ControllerHelper::wrapOutput(parent::runAction($id, $params), false);
        } catch (\Exception $e) {
            return ControllerHelper::handleException($e, false);
        }
    }

}