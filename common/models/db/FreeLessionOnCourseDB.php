<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "free_lession_on_course".
 *
 * @property integer $course_id
 * @property integer $student_id
 * @property integer $number_lession
 */
class FreeLessionOnCourseDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'free_lession_on_course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'student_id'], 'required'],
            [['course_id', 'student_id', 'number_lession'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => Yii::t('cms', 'Course ID'),
            'student_id' => Yii::t('cms', 'Student ID'),
            'number_lession' => Yii::t('cms', 'Number Lession'),
        ];
    }
}
