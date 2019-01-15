<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "df_organize_activity".
 *
 * @property int $activity_id 组织活动编号
 * @property int $sort_id 活动所属分类编号
 * @property string $title 活动标题
 * @property string $content 活动内容
 * @property string $start_time 活动时间
 * @property string $place 活动地点
 * @property int $integral 本次活动积分
 * @property int $state 组织活动状态，0代表草稿，2代表审核中，3代表审核未通过，1代表审核通过并且发布,4已截止
 * @property string $description 活动描述
 * @property string $image_url 活动图片地址
 * @property string $user_list 指定的用户列表
 * @property int $assign_status 活动指定状态，0代表不限，1代表限制
 * @property int $created_organization_id 创建组织
 * @property int $submit_organization_id 提交审核的组织
 * @property int $review_organization_id 审核的组织
 * @property int $index_no 是否推送到首页，0代表不推送，1代表推送
 * @property int $top_no 是否置顶，0代表不置顶，1代表置顶
 * @property int $carousel_no 是否推送到轮播，0代表不推送，1代表推送
 * @property int $del_flag 活动信息删除状态，0代表未删除，1代表已删除
 * @property int $create_uid 创建的管理员
 * @property string $created_time
 * @property string $updated_time
 */
class OrganizeActivity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'df_organize_activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort_id', 'integral', 'state', 'assign_status', 'created_organization_id', 'submit_organization_id', 'review_organization_id', 'index_no', 'top_no', 'carousel_no', 'del_flag', 'create_uid'], 'integer'],
            [['title', 'content', 'start_time', 'place', 'description', 'image_url'], 'required'],
            [['content', 'user_list'], 'string'],
            [['start_time', 'created_time', 'updated_time'], 'safe'],
            [['title'], 'string', 'max' => 50],
            [['place'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 100],
            [['image_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'activity_id' => 'Activity ID',
            'sort_id' => 'Sort ID',
            'title' => 'Title',
            'content' => 'Content',
            'start_time' => 'Start Time',
            'place' => 'Place',
            'integral' => 'Integral',
            'state' => 'State',
            'description' => 'Description',
            'image_url' => 'Image Url',
            'user_list' => 'User List',
            'assign_status' => 'Assign Status',
            'created_organization_id' => 'Created Organization ID',
            'submit_organization_id' => 'Submit Organization ID',
            'review_organization_id' => 'Review Organization ID',
            'index_no' => 'Index No',
            'top_no' => 'Top No',
            'carousel_no' => 'Carousel No',
            'del_flag' => 'Del Flag',
            'create_uid' => 'Create Uid',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        ];
    }
}
