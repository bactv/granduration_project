<?php

namespace frontend\models;

use Yii;


class Course extends \common\models\CourseBase
{
    public $video_intro;
    public $lecture_note;

    public static function list_course_by_teacher($teacher_id)
    {
        $allData = Course::findAll(['status' => 1, 'teacher_id' => $teacher_id, 'party_id' => null]);
        return $allData;
    }
}