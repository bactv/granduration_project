<?php

namespace frontend\models;

use Yii;


class LessonCourse extends \common\models\LessonCourseBase
{
    public $video;
    public $home_work;

    public static function get_all_lesson_by_course($course_id)
    {
        return self::find()->where(['course_id' => $course_id, 'status' => 1])->orderBy('sort ASC')->asArray()->all();
    }

    public static function get_lesson($lesson_id)
    {
        return self::find()->where(['id' => $lesson_id, 'status' => 1])->one();
    }

    public static function get_list_lesson_others($course_id, $lesson_id)
    {
        return self::find()->where(['course_id' => $course_id, 'status' => 1])->andWhere('id <> ' . $lesson_id)->orderBy('sort ASC')->asArray()->all();
    }
}