<?php

namespace mobile\components;

use common\models\User;


/**
 * @author lovebing Created on 十一月 19, 2017
 */
class MobileBaseController extends \common\components\BaseController
{
    //当前登录管理员对象
    public $this_user = null;

    public function beforeAction($action)
    {

        return true;
    }
}