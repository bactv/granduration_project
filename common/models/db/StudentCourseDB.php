<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "student_course".
 *
 * @property integer $course_id
 * @property string $course_name
 * @property integer $student_id
 * @property string $student_name
 * @property string $student_signed_date
 */
class StudentCourseDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'student_id'], 'required'],
            [['course_id', 'student_id'], 'integer'],
            [['student_signed_date'], 'safe'],
            [['course_name', 'student_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => Yii::t('cms', 'Course ID'),
            'course_name' => Yii::t('cms', 'Course Name'),
            'student_id' => Yii::t('cms', 'Student ID'),
            'student_name' => Yii::t('cms', 'Student Name'),
            'student_signed_date' => Yii::t('cms', 'Student Signed Date'),
        ];
    }
}
