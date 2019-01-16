<?php

namespace common;

use yii\base\InvalidConfigException;
use yii\base\InvalidRouteException;
use yii\log\Logger;


/**
 * @author lovebing Created on Sep 2, 2018
 */
class ControllerHelper
{

    public static function init()
    {
        @header('Access-Control-Allow-Origin: '.filter_input(INPUT_SERVER, 'HTTP_ORIGIN'));
        @header('Access-Control-Allow-Headers: Content-Type, X-Requested-With,x-access-token');
        @header("Access-Control-Allow-Credentials: true");
        @header("Access-Control-Allow-Methods: GET,PUT,POST,DELETE,OPTIONS,PATCH");

        if (\Yii::$app->request->getMethod() === 'OPTIONS') {
            exit;
        }
    }


    public static function wrapOutput($output, $rest = true)
    {
        if (!is_array($output)) {
            $wrapped = [
                'data' => $output,
                'code' => 0
            ];
        } else {
            $wrapped = $output;
        }
        if (!isset($wrapped['code'])) {
            $wrapped['code'] = 0;
        }
        if ($rest) {
            return $wrapped;
        } else {
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode($wrapped);
            exit;
        }
    }

    public static function handleException(\Exception $e = null, $rest = true)
    {
        if ($e == null) {
            return self::handleOutput([
                'code' => -1,
                'msg' => 'Unknown'
            ], $rest);
        }

        if ($e instanceof \RuntimeException) {
            \Yii::getLogger()->log($e->getMessage(), Logger::LEVEL_ERROR);
            return self::handleOutput([
                'code' => $e->getCode() == 0 ? -1 : $e->getCode(),
                'msg' => $e->getMessage()
            ], $rest);
        }
        $msg = '内部发生错误: '.$e->getMessage();
        $fullMessage = $msg . ',' . $e->getFile().','.$e->getLine();
        if (YII_ENV != 'prod') {
            $msg = $fullMessage;
        }
        \Yii::getLogger()->log($fullMessage, Logger::LEVEL_ERROR);
        $response = [
            'code' => $e->getCode() == 0 ? -1 : $e->getCode(),
            'msg' => $msg
        ];
        if ($e instanceof InvalidRouteException || $e instanceof InvalidConfigException) {
            return json_encode($response);
        }
        return self::handleOutput($response, $rest);
    }

    private static function handleOutput($output, $rest = true)
    {
        if ($rest || !is_array($output)) {
            return $output;
        }
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($output);
        exit;
    }
}