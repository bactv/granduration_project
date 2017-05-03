<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "course_test".
 *
 * @property integer $course_id
 * @property integer $student_id
 * @property string $created_time
 */
class CourseTestDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'student_id'], 'required'],
            [['course_id', 'student_id'], 'integer'],
            [['created_time'], 'safe']
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
            'created_time' => Yii::t('cms', 'Created Time'),
        ];
    }
}
