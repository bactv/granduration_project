<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "course_news".
 *
 * @property integer $id
 * @property integer $course_id
 * @property string $title
 * @property string $content
 * @property integer $status
 * @property string $created_time
 * @property string $updated_time
 */
class CourseNewsDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'title'], 'required'],
            [['course_id', 'status'], 'integer'],
            [['content'], 'string'],
            [['created_time', 'updated_time'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
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
