<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "df_user_organize_activity".
 *
 * @property int $user_activity_id 用户参加组织活动编号
 * @property int $activity_id 组织活动编号
 * @property int $user_id 用户编号
 * @property int $joins_tatus 用户参加活动状态，0代表待确认参加，1代表已确认参加
 * @property int $integral 参加本次活动积分
 * @property int $sign_status 签到状态,0代表未签到，1代表已签到
 * @property string $sign_time 签到时间
 * @property int $del_flag 删除状态：0代表未删除，1代表已删除
 * @property int $create_uid 创建的管理员
 * @property string $created_time
 * @property string $updated_time
 */
class UserOrganizeActivity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'df_user_organize_activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['activity_id', 'user_id', 'joins_tatus', 'integral', 'sign_status', 'del_flag', 'create_uid'], 'integer'],
            [['sign_time', 'created_time', 'updated_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_activity_id' => 'User Activity ID',
            'activity_id' => 'Activity ID',
            'user_id' => 'User ID',
            'joins_tatus' => 'Joins Tatus',
            'integral' => 'Integral',
            'sign_status' => 'Sign Status',
            'sign_time' => 'Sign Time',
            'del_flag' => 'Del Flag',
            'create_uid' => 'Create Uid',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        ];
    }
}
