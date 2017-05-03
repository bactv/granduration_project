<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 03/05/2017
 * Time: 7:38 SA
 */
namespace backend_teacher\models;

use common\components\Utility;
use common\models\CourseBase;
use Yii;

class Course extends CourseBase
{
    public $logo;
    public $video_intro;
    public $lecture_note;
    public $references;

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
            [['lecture_note', 'video_intro'], 'required', 'on' => 'self_create'],
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
     * @param $multiple
     * @return bool
     */
    public function upload_file($attribute, $teacher_id, $course_id, $type, $multiple = false)
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
            $c = false;
            if ($multiple) {
                foreach ($this->{$attribute} as $k => $file) {
                    $name = Utility::clean_string($file->baseName);
                    $file->saveAs($path_admin . $name . ($k + 1) . '_' . time() . '.' . $file->extension);
                    $c = Utility::uploadFile($path, $path . $name . ($k + 1) . '_' . time() . '.' . $file->extension, Yii::$app->params['cms_teacher_url'] . 'storage/' . $path . $name . ($k + 1) . '_' . time() . '.' . $file->extension);
//                    unlink(Yii::getAlias('@webroot') . '/storage/');
                }
            } else {
                $name = Utility::clean_string($this->{$attribute}->baseName);
                $this->{$attribute}->saveAs($path_admin . $name . '_' . time() . '.' . $this->{$attribute}->extension);
                $c = Utility::uploadFile($path, $path . $name . '_' . time() . '.' . $this->{$attribute}->extension, Yii::$app->params['cms_teacher_url'] . 'storage/' . $path . $name . '_' . time() . '.' . $this->{$attribute}->extension);
//                unlink(Yii::getAlias('@webroot') . '/storage/');
            }
            return $c;
        } else {
            return false;
        }
    }

    public static function get_all_course($teacher_id)
    {
        return self::findAll(['teacher_id' => $teacher_id]);
    }

    public static function get_course_by_id($course_id)
    {
        return self::findOne(['course_id' => $course_id]);
    }
}