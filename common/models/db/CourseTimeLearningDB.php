<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "course_time_learning".
 *
 * @property integer $id
 * @property integer $course_id
 * @property integer $weekday
 * @property string $time_start
 */
class CourseTimeLearningDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_time_learning';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id'], 'required'],
            [['course_id', 'weekday'], 'integer'],
            [['time_start'], 'safe']
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
            'weekday' => Yii::t('cms', 'Weekday'),
            'time_start' => Yii::t('cms', 'Time Start'),
        ];
    }
}
