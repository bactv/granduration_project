<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $course_id
 * @property string $course_name
 * @property string $course_description
 * @property integer $teacher_id
 * @property integer $party_id
 * @property integer $course_type_id
 * @property string $price
 * @property string $signed_to_date
 * @property string $start_date
 * @property string $end_date
 * @property integer $subject_id
 * @property integer $class_level_id
 * @property integer $privacy
 * @property integer $status
 * @property integer $approved
 * @property integer $approver
 * @property string $created_time
 * @property string $updated_time
 * @property integer $created_by
 * @property integer $updated_by
 */
class CourseDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_name', 'party_id', 'course_type_id', 'class_level_id'], 'required'],
            [['course_description'], 'string'],
            [['teacher_id', 'party_id', 'course_type_id', 'subject_id', 'class_level_id', 'privacy', 'status', 'approved', 'approver', 'created_by', 'updated_by'], 'integer'],
            [['price'], 'number'],
            [['signed_to_date', 'start_date', 'end_date', 'created_time', 'updated_time'], 'safe'],
            [['course_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => Yii::t('web', 'Course ID'),
            'course_name' => Yii::t('web', 'Course Name'),
            'course_description' => Yii::t('web', 'Course Description'),
            'teacher_id' => Yii::t('web', 'Teacher ID'),
            'party_id' => Yii::t('web', 'Party ID'),
            'course_type_id' => Yii::t('web', 'Course Type ID'),
            'price' => Yii::t('web', 'Price'),
            'signed_to_date' => Yii::t('web', 'Signed To Date'),
            'start_date' => Yii::t('web', 'Start Date'),
            'end_date' => Yii::t('web', 'End Date'),
            'subject_id' => Yii::t('web', 'Subject ID'),
            'class_level_id' => Yii::t('web', 'Class Level ID'),
            'privacy' => Yii::t('web', 'Privacy'),
            'status' => Yii::t('web', 'Status'),
            'approved' => Yii::t('web', 'Approved'),
            'approver' => Yii::t('web', 'Approver'),
            'created_time' => Yii::t('web', 'Created Time'),
            'updated_time' => Yii::t('web', 'Updated Time'),
            'created_by' => Yii::t('web', 'Created By'),
            'updated_by' => Yii::t('web', 'Updated By'),
        ];
    }
}
