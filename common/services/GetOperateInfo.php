<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/16
 * Time: 16:32
 */

namespace common\services;


class GetOperateInfo
{


    // 获取当前请求的 User-Agent: 头部的内容。
//$_SERVER['HTTP_USER_AGENT']; // 当前返回结果：Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36

// 获取当前请求的 Accept-Language: 头部的内容。
//$_SERVER['HTTP_ACCEPT_LANGUAGE'];  // 当前返回结果：zh-CN,zh;q=0.8

// 利用正则表达式匹配以上字符串，用户的浏览器操作系统信息。

    /**
     * 获得访客操作系统
     */
    function get_os() {
        if (!empty($_SERVER['HTTP_USER_AGENT'])) {
            $os = $_SERVER['HTTP_USER_AGENT'];
            if (preg_match('/win/i', $os)) {
                $os = 'Windows';
            } else if (preg_match('/mac/i', $os)) {
                $os = 'MAC';
            } else if (preg_match('/linux/i', $os)) {
                $os = 'Linux';
            } else if (preg_match('/unix/i', $os)) {
                $os = 'Unix';
            } else if (preg_match('/bsd/i', $os)) {
                $os = 'BSD';
            } else {
                $os = 'Other';
            }
            return $os;
        } else {
            return 'unknow';
        }
    }

    /**
     * 获得访问者浏览器
     */
    function browse_info() {
//        if (!empty($_SERVER['HTTP_USER_AGENT'])) {
//            $br = $_SERVER['HTTP_USER_AGENT'];
//            if (preg_match('/MSIE/i', $br)) {
//                $br = 'MSIE';
//            } else if (preg_match('/Firefox/i', $br)) {
//                $br = 'Firefox';
//            } else if (preg_match('/Chrome/i', $br)) {
//                $br = 'Chrome';
//            } else if (preg_match('/Safari/i', $br)) {
//                $br = 'Safari';
//            } else if (preg_match('/Opera/i', $br)) {
//                $br = 'Opera';
//            }
//            else {
//                $br = 'Other';
//            }
//            return $br;
//        } else {
//            return 'unknow';
//        }
        $sys = $_SERVER['HTTP_USER_AGENT'];  //获取用户代理字符串
        if (stripos($sys, "Firefox/") > 0) {
            preg_match("/Firefox\/([^;)]+)+/i", $sys, $b);
            $exp[0] = "Firefox";
            $exp[1] = $b[1];  //获取火狐浏览器的版本号
        } elseif (stripos($sys, "Maxthon") > 0) {
            preg_match("/Maxthon\/([\d\.]+)/", $sys, $aoyou);
            $exp[0] = "傲游";
            $exp[1] = $aoyou[1];
        } elseif (stripos($sys, "MSIE") > 0) {
            preg_match("/MSIE\s+([^;)]+)+/i", $sys, $ie);
            $exp[0] = "IE";
            $exp[1] = $ie[1];  //获取IE的版本号
        } elseif (stripos($sys, "OPR") > 0) {
            preg_match("/OPR\/([\d\.]+)/", $sys, $opera);
            $exp[0] = "Opera";
            $exp[1] = $opera[1];
        } elseif(stripos($sys, "Edge") > 0) {
            //win10 Edge浏览器 添加了chrome内核标记 在判断Chrome之前匹配
            preg_match("/Edge\/([\d\.]+)/", $sys, $Edge);
            $exp[0] = "Edge";
            $exp[1] = $Edge[1];
        } elseif (stripos($sys, "Chrome") > 0) {
            preg_match("/Chrome\/([\d\.]+)/", $sys, $google);
            $exp[0] = "Chrome";
            $exp[1] = $google[1];  //获取google chrome的版本号
        } elseif(stripos($sys,'rv:')>0 && stripos($sys,'Gecko')>0){
            preg_match("/rv:([\d\.]+)/", $sys, $IE);
            $exp[0] = "IE";
            $exp[1] = $IE[1];
        }else {
            $exp[0] = "未知浏览器";
            $exp[1] = "";
        }
        return $exp;
    }

    /**
     * 获得访问者浏览器语言
     */
    function get_lang() {
        if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
            $lang = substr($lang, 0, 5);
            if (preg_match('/zh-cn/i',$lang)) {
                $lang = '简体中文';
            } else if (preg_match('/zh/i',$lang)) {
                $lang = '繁体中文';
            } else {
                $lang = 'English';
            }
            return $lang;
        } else {
            return 'unknow';
        }
    }

}