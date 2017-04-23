<?php

namespace frontend\models;

use Yii;
use yii\db\Query;


class StudentQuiz extends \common\models\StudentQuizBase
{
    public static function get_info($quiz_id)
    {
        $info = (new Query())->select([
                'COUNT(DISTINCT student_id) as total_student',
                'SUM(rate) as total_point_rate',
                'SUM(IF(rate > 0, 1, 0)) as total_student_rate'
            ])->from('student_quiz')
            ->where(['quiz_id' => $quiz_id])
            ->one();
        return $info;
    }
}