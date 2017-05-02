<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;
use yii\db\Query;


class CourseNews extends \common\models\CourseNewsBase
{
    public static function get_list_news($course_id)
    {
        $query = (new Query())
            ->from('course_news')
            ->where(['course_id' => $course_id])
            ->orderBy('updated_time DESC');
        $pagination = new Pagination(['totalCount' => $query->count()]);
        $data = $query->limit($pagination->limit)
            ->offset($pagination->offset)
            ->all();
        return compact('data', 'pagination');
    }

    public static function get_all_news($course_id, $limit = 5)
    {
        return self::find()->where(['course_id' => $course_id, 'status' => 1])
            ->orderBy('updated_time DESC')
            ->limit($limit)
            ->all();
    }
}