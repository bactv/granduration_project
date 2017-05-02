<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "lesson_course".
 *
 * @property integer $id
 * @property integer $course_id
 * @property string $lesson_name
 * @property string $lesson_desc
 * @property string $link_video
 * @property integer $time_length
 * @property integer $sort
 * @property integer $number_view
 * @property integer $pass_the_exam
 * @property integer $status
 * @property string $created_time
 * @property string $updated_time
 * @property integer $created_by
 * @property integer $updated_by
 */
class LessonCourseDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lesson_course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'lesson_name'], 'required'],
            [['course_id', 'time_length', 'sort', 'number_view', 'pass_the_exam', 'status', 'created_by', 'updated_by'], 'integer'],
            [['lesson_desc'], 'string'],
            [['created_time', 'updated_time'], 'safe'],
            [['lesson_name', 'link_video'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms', 'ID'),
            'course_id' => Yii::t('cms', 'Course ID'),
            'lesson_name' => Yii::t('cms', 'Lesson Name'),
            'lesson_desc' => Yii::t('cms', 'Lesson Desc'),
            'link_video' => Yii::t('cms', 'Link Video'),
            'time_length' => Yii::t('cms', 'Time Length'),
            'sort' => Yii::t('cms', 'Sort'),
            'number_view' => Yii::t('cms', 'Number View'),
            'pass_the_exam' => Yii::t('cms', 'Pass The Exam'),
            'status' => Yii::t('cms', 'Status'),
            'created_time' => Yii::t('cms', 'Created Time'),
            'updated_time' => Yii::t('cms', 'Updated Time'),
            'created_by' => Yii::t('cms', 'Created By'),
            'updated_by' => Yii::t('cms', 'Updated By'),
        ];
    }
}
