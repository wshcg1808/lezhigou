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