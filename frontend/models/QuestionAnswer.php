<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 28/03/2017
 * Time: 9:40 CH
 */
namespace frontend\models;

use common\models\QuestionAnswerBase;
use Yii;

class QuestionAnswer extends QuestionAnswerBase
{
    public static function check_answer($question_id, $answer_id)
    {
        $check = false;
        $solution = '';
        $obj = self::findOne(['question_id' => $question_id, 'ans_id' => $answer_id]);
        if (!empty($obj) && $obj->is_true == 1) {
            $check = true;
            $solution = $obj->soluion;
        }
        return compact('check', 'solution');
    }
}