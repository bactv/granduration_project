<?php

namespace common\models;

use common\behaviors\TimestampBehavior;
use Yii;


class CourseNewsBase extends \common\models\db\CourseNewsDB
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['created_time', 'updated_time'],
                    self::EVENT_BEFORE_UPDATE => ['updated_time'],
                ]
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms', 'ID'),
            'course_id' => Yii::t('cms', 'Khóa học'),
            'title' => Yii::t('cms', 'Tiêu đề'),
            'content' => Yii::t('cms', 'Nội dung'),
            'status' => Yii::t('cms', 'Trạng thái'),
            'created_time' => Yii::t('cms', 'Ngày tạo'),
            'updated_time' => Yii::t('cms', 'Ngày sửa'),
        ];
    }
}
