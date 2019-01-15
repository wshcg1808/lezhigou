<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/15
 * Time: 17:51
 */

namespace admin\services;


class ActivityDelService
{

    /**
     * 事物处理多张表状态改变，确保数据库数据的完整性和一致性
     */
    public function del($activity_id)
    {
        $db = \Yii::$app->db;
        $transaction = $db->beginTransaction();
        try {
            $db->createCommand("UPDATE df_organize_activity SET del_flag='1' WHERE activity_id={$activity_id}")->execute();
            $db->createCommand("UPDATE df_user_organize_activity SET del_flag='1' WHERE activity_id={$activity_id}")->execute();
            $transaction->commit();
        } catch(\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch(\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
        \Yii::info("删除成功");
    }

}