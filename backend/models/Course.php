<?php

namespace backend\models;

use common\components\Utility;
use Yii;


class Course extends \common\models\CourseBase
{
    public $logo;
    public $video_intro;
    public $lecture_note;

    public function rules()
    {
        return [
            [['course_name', 'course_description', 'course_type_id', 'subject_id', 'class_level_id'], 'required'],
            [['course_description'], 'string'],
            [['teacher_id', 'party_id', 'course_type_id', 'subject_id', 'class_level_id', 'privacy', 'status', 'deleted', 'approved', 'approver', 'created_by', 'updated_by'], 'integer'],
            [['price'], 'number'],
            [['signed_to_date', 'start_date', 'end_date', 'created_time', 'updated_time'], 'safe'],
            [['course_name'], 'string', 'max' => 255],
            [['logo'], 'file', 'extensions' => 'jpg, png, gif, jpeg'],
            [['video_intro'], 'file', 'extensions' => 'mp4, wma, wav, avi, flv'],
            [['lecture_note'], 'file', 'extensions' => 'pdf, dox, docx, xlsx'],
            [['lecture_note', 'video_intro'], 'required', 'on' => 'self_create']
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
            'course_description' => Yii::t('cms', 'Course Description'),
            'teacher_id' => Yii::t('cms', 'Teacher'),
            'party_id' => Yii::t('cms', 'Party'),
            'course_type_id' => Yii::t('cms', 'Course Type ID'),
            'price' => Yii::t('cms', 'Price'),
            'signed_to_date' => Yii::t('cms', 'Signed To Date'),
            'start_date' => Yii::t('cms', 'Start Date'),
            'end_date' => Yii::t('cms', 'End Date'),
            'subject_id' => Yii::t('cms', 'Subjects'),
            'class_level_id' => Yii::t('cms', 'Class Levels'),
            'privacy' => Yii::t('cms', 'Privacy'),
            'status' => Yii::t('cms', 'Status'),
            'deleted' => Yii::t('cms', 'Deleted'),
            'approved' => Yii::t('cms', 'Approved Status'),
            'approver' => Yii::t('cms', 'Approver'),
            'created_time' => Yii::t('cms', 'Created Time'),
            'updated_time' => Yii::t('cms', 'Updated Time'),
            'created_by' => Yii::t('cms', 'Created By'),
            'updated_by' => Yii::t('cms', 'Updated By'),
        ];
    }

    /**
     * Upload file
     * @param $attribute
     * @param $teacher_id
     * @param $course_id
     * @param $type
     * @return bool
     */
    public function upload_file($attribute, $teacher_id, $course_id, $type)
    {
        if ($this->{$attribute} == null) {
            return true;
        }
        $path =  Yii::$app->params['img_url']['courses_assets']['folder'] . '/' . $teacher_id . '/' . $course_id . '/' . $type . '/';
        $path_admin = Yii::getAlias('@webroot') . '/storage/' . $path;
        if (!is_dir($path_admin)) {
            mkdir($path_admin, 0777, true);
        }

        if (true) {
            $this->{$attribute}->saveAs($path_admin . $type . '.' . $this->{$attribute}->extension);
            $c = Utility::uploadFile($path, $path . $type . '.' . $this->{$attribute}->extension, Yii::$app->params['web_url'] . 'storage/' . $path . $type . '.' . $this->{$attribute}->extension);
            unlink(Yii::getAlias('@webroot') . '/storage/');
            return $c;
        } else {
            return false;
        }
    }
}