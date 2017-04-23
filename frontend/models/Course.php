<?php

namespace frontend\models;

use backend\models\Party;
use common\components\Utility;
use Yii;
use yii\data\Pagination;
use yii\db\Query;


class Course extends \common\models\CourseBase
{
    public $video_intro;
    public $lecture_note;
    public $weekday_time;

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
            'video_intro' => Yii::t('web', 'Video Intro'),
            'lecture_note' => Yii::t('web', 'Lecture Note'),
            'weekday_time' => Yii::t('web', 'Weekday Time'),
        ];
    }

    public function rules()
    {
        return [
            [['course_name', 'course_description', 'course_type_id', 'subject_id', 'class_level_id', 'video_intro', 'lecture_note'], 'required'],
            [['course_description'], 'string'],
            [['teacher_id', 'party_id', 'course_type_id', 'subject_id', 'class_level_id', 'privacy', 'status', 'approved', 'approver', 'created_by', 'updated_by'], 'integer'],
            [['price'], 'number'],
            [['signed_to_date', 'start_date', 'end_date', 'created_time', 'updated_time'], 'safe'],
            [['course_name'], 'string', 'max' => 255],
            [['video_intro'], 'file', 'extensions' => 'mp4, wma, wav, avi, flv'],
            [['lecture_note'], 'file', 'extensions' => 'pdf, dox, docx, xlsx'],
        ];
    }

    /**
     * List course of teacher
     * @param $teacher_id
     * @return static[]
     */
    public static function list_course_by_teacher($teacher_id)
    {
        $allData = Course::findAll(['status' => 1, 'teacher_id' => $teacher_id, 'party_id' => null]);
        return $allData;
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

    public static function search_course($params = [])
    {
        $query = (new Query())
            ->select('*')
            ->from('course')
            ->where([
               'privacy' => 1,
                'status' => 1,
                'deleted' => 0,
                'approved' => 1
            ]);
        if (!empty($params['class_id'])) {
            $query->andWhere(['class_level_id' => $params['class_id']]);
        }
        if (!empty($params['subject_id'])) {
            $query->andWhere(['subject_id' => $params['subject_id']]);
        }
        $pagination = new Pagination(['totalCount' => $query->count()]);
        $results = $query->limit($pagination->limit)
            ->offset($pagination->offset)
            ->all();
        return compact('pagination', 'results');
    }

    public static function get_course_active($course_id)
    {
        $object = Course::findOne([
            'course_id' => $course_id,
            'approved' => 1,
            'deleted' => 0,
            'status' => 1,
            'privacy' => 1
        ]);
        return $object;
    }
}